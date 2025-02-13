<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestSignature extends Model
{
    protected $table = 'purchase_request_signature';
    protected $fillable = [
        'id',
        'purchase_request_number',
        'approved_user',
        'approved_manager',
        "acknowledge"
    ];
}
