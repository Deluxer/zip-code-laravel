<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{

    protected $fillable = [
        'zip_code',
        'locality',
        'federal_key',
        'federal_name',
        'federal_code',
        'settlements_key',
        'settlements_name',
        'settlements_zone',
        'settlements_type_name',
        'municipalty_key',
        'municipalty_name',
    ];
}
