<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;

    public function Record()
    {
        return $this->belongsTo(Record::class, 'id');
    }
    protected $attributes = [
        'transQuantity' => 0, // Default to 0 if not provided
    ];
}
