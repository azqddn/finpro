<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'transId',
        'userId',
        'recordDesc',
        'recordRevenue',
        'recordExpenses',
        'recordBalance',
        'recordNotes',
        'recordProof',
        'recordStatus', 
        
    ];

    /**
     * Relationship
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function InventoryTransaction()
    {
        return $this->hasMany(InventoryTransaction::class, 'transId');
    }

}
