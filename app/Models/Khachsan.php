<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khachsan extends Model
{
    protected $table = 'khachsans';

    protected $fillable = [
        'tenKhachSan',
        'slug',
        'diaChi',
        'hinh_anh',
        'moTa',
        'loaiPhong',
        'soGiuong',
        'soNgay',
        'soDem',
        'gia',
        'lienLac',
        'trangThai',
        'khach_hang_yeu_thich',
    ];

    public function hoadonkhachsans()
    {
        return $this->hasMany(Hoadonkhachsan::class, 'idKhachSan', 'id');
    }
}
