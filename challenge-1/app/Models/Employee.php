<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];

    function schedule(){
        return $this->hasOne(Schedule::class);
    }

    function attendence(){
        return $this->hasMany(Attendence::class);
    }
}
