<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestList extends Model
{
    protected $table = 'purchase_request_list';
    protected $fillable = [
        'id',
        'purchase_request_number',
        'material',
        "kategory",
        "description",
        "qty",
        "uom"
    ];
}
