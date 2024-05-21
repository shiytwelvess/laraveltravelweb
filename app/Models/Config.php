<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table    = 'configs';

    protected $fillable = [
        'bg_home',
        'bg_home_1',
        'bg_home_2',
        'dia_diem',
        'dia_diem_1',
        'dia_diem_2',
    ];
}
