<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function Product()
    {
        return$this->hasMany(Product::class, 'id');
    }
}
