<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function Category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
    
    public function EditedProduct()
    {
        return $this->hasMany(EditedProduct::class, 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
