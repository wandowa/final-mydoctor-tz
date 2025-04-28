<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Booking;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class BookingController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('booking', compact('projects'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|in:TSH,USD',
        ]);

        $project = Project::find($request->project_id);
        $amount = $request->amount;
        $currency = $request->currency;

        // Simple logic: Convert TSH to USD if needed (e.g., 1 USD = 2300 TSH)
        $paypalAmount = $currency === 'TSH' ? $amount / 2300 : $amount;

        $booking = Booking::create([
            'project_id' => $project->id,
            'amount' => $amount,
            'currency' => $currency,
        ]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD", // PayPal only accepts USD here, we convert TSH
                        "value" => number_format($paypalAmount, 2, '.', ''),
                    ],
                    "description" => "Donation for {$project->title}",
                ]
            ],
            "application_context" => [
                "return_url" => route('booking.success', $booking->id),
                "cancel_url" => route('booking.cancel', $booking->id),
            ]
        ]);

        if (isset($response['id'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('booking')->with('error', 'Payment initiation failed.');
    }

    public function success(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->get('token'));

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $booking->update([
                'paypal_transaction_id' => $response['id'],
                'status' => 'completed',
            ]);
            return redirect()->route('booking')->with('success', 'Payment successful!');
        }

        $booking->update(['status' => 'failed']);
        return redirect()->route('booking')->with('error', 'Payment failed.');
    }

    public function cancel($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->update(['status' => 'failed']);
        return redirect()->route('booking')->with('error', 'Payment cancelled.');
    }
}