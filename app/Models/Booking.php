<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['project_id', 'amount', 'currency', 'paypal_transaction_id', 'status'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}