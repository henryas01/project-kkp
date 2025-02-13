<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestHead extends Model
{
    protected $table = 'purchase_request_head';
     protected $fillable = [
        'id',
        'purchase_request_number',
        'user_ID',
        "document_date",
        "status",
    ];

}
