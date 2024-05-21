<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'hoTen',
        'soDienThoai',
        'diaChi',
        'email',
        'password',
        'ngaySinh',
        'gioiTinh',
        'trangThai',
        // 'idUser',
        'hash_reset',
        'hash_mail'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'idUser', 'id');
    // }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'idCustomer', 'id');
    }

    public function hoadontours()
    {
        return $this->hasMany(Hoadontour::class, 'idCustomer', 'id');
    }


    public function hoadonkhachsans()
    {
        return $this->hasMany(Hoadonkhachsan::class, 'idCustomer', 'id');
    }
}
