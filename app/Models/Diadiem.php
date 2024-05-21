<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diadiem extends Model
{
    protected $table = 'diadiems';

    protected $fillable = [
        'tenDiaDiem',
        'diaChi',
        'hinh_anh',
        'moTa',
        'lienLac',
        'trangThai',
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'idDiaDiem,', 'id');
    }
}
