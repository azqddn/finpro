<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function User(){
        return $this->hasMany(User::class,'id');
    }
    
}
