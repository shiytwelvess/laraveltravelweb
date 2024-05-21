<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    protected $fillable = [
        'slug',
        'tenTour',
        'hinh_anh',
        'moTa',
        'thoiGianBatDau',
        'thoiGianKetThuc',
        'gia',
        'trangThai',
        'diemDon',
        'idDiaDiem',
    ];

    public function diadiems()
    {
        return $this->belongsTo(DiaDiem::class, 'idDiaDiem', 'id');
    }

    public function hoadontours()
    {
        return $this->hasMany(Hoadontour::class, 'idTour', 'id');
    }
}
