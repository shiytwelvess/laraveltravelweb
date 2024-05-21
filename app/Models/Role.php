<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'idRole';

    protected $fillable = [
        'roleName',
        'moTa',
        'trangThai',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'idRole', 'id');
    }
}
