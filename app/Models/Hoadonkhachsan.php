<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonkhachsan extends Model
{
    use HasFactory;

    protected $table = 'hoadonkhachsans';

    protected $fillable = [
        'idKhachSan',
        'idCustomer',
        'hoTen',
        'email',
        'soDienThoai',
        'diaChi',
        'soPhong',
        'tongTien',
        'trangThai',
    ];

    public function khachsans()
    {
        return $this->belongsTo(Khachsan::class, 'idKhachSan', 'id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'idCustomer', 'id');
    }

    public function danhgiakhachsans()
    {
        return $this->hasMany(Danhgiakhachsan::class, 'idHDKhachSan', 'id');
    }
}
