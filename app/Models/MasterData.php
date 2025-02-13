<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Master data model
 *
 * @property int $id
 * @property string $material
 * @property string $kategory
 * @property int $tebal
 * @property int $lebar
 * @property int $berat_jenis
 */

class MasterData extends Model
{

     protected $table ='master_data';
     protected $fillable = [
        'id',
        'email',
        'material',
        "kategory",
        "tebal",
        "lebar",
        "berat_jenis"
    ];
}
