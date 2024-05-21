<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiakhachsan extends Model
{
    use HasFactory;

    protected $table = 'danhgiakhachsans';

    protected $fillable = [
        'idHDKhachSan',
        'diemDanhGia',
        'noiDung',
    ];

    public function hoadonkhachsans()
    {
        return $this->belongsTo(Hoadonkhachsan::class, 'idHDKhachSan', 'id');
    }
}
