<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TotalProject extends Model
{
    protected $table = 'total_project';

    protected $primaryKey = 'id_total_project';

    protected $fillable = [
        'date',
        'type',
        'cost',
        'client',
    ];
}
