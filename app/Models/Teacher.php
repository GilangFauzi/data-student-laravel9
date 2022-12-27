<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function class(){
        // dari table teacher reation ke table class
        return $this->hasOne(ClassModel::class);
    }
}
