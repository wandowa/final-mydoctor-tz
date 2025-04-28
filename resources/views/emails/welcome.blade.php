<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Newsletter</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1 style="color: #2d3748;">Welcome Aboard!</h1>
        <p>Thanks for subscribing to the MY DOCTOR TZ Newsletter! We’re excited to have you with us.</p>
        <p>You’ll get the latest updates, health tips, and exclusive offers right in your inbox.</p>
        <p>If you ever want to stop receiving these emails, just click the unsubscribe link at the bottom of any newsletter.</p>
        <p>Cheers,<br>The MY DOCTOR TZ Team</p>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">
        <p style="font-size: 12px; color: #718096;">
            You received this email because you subscribed at {{ url('/') }}.<br>
            <a href="{{ url('/unsubscribe') }}" style="color: #48bb78;">Unsubscribe</a>
        </p>
    </div>
</body>
</html>