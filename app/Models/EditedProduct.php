<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'fieldChanged',
        'oldValue',
        'newValue',
        'reason',
        'editProof',
        'userId',
        'productId',
    ];

    /**
     * Relationship
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
