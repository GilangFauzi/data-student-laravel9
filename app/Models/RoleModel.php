<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'roles';

    // public function user()
    // {
    //     return $this->hasMany(User::class);
    // }
}