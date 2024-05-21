<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogss';

    protected $fillable = [
        'tieuDe',
        'noiDung',
        'trangThai',
        'idCustomer',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'idCustomer', 'id');
    }
}
