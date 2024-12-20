<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'id_income';

    protected $fillable = [
        'date',
        'source',
        'amount',
    ];
}
