<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    protected $table = 'baiviets';

    protected $fillable = [
        'tieuDe',
        'hinh_anh',
        'moTaNgan',
        'noiDung',
        'trangThai',
    ];
}
