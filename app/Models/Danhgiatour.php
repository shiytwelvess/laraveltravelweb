<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgiatour extends Model
{
    use HasFactory;

    protected $table = 'danhgia_tours';

    protected $fillable = [
        'idHDTour',
        'diemDanhGia',
        'noiDung',
    ];

    public function hoadontours()
    {
        return $this->belongsTo(Hoadontour::class, 'idHDTour', 'id');
    }
}
