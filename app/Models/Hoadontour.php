<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadontour extends Model
{
    use HasFactory;

    protected $table = 'hoadontours';

    protected $fillable = [
        'idTour',
        'idCustomer',
        'hoTen',
        'email',
        'soDienThoai',
        'diaChi',
        'soVe',
        'tongTien',
        'trangThai',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'idCustomer', 'id');
    }

    public function tours()
    {
        return $this->belongsTo(Tour::class, 'idTour', 'id');
    }

    public function danhgiatours()
    {
        return $this->hasMany(Danhgiatour::class, 'idHDTour', 'id');
    }
}
