<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'address',
        'ic',
        'phone',
        'staffId',
        'photo',
        'companyId'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn($value) =>  ["admin", "owner", "staff"][$value],
        );
    }

    /**
     * Relationship
     */
    public function Company(){
        return $this->belongsTo(Company::class,'companyId');
    }

    public function EditedProduct()
    {
        return $this->hasMany(EditedProduct::class, 'id');
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function Record()
    {
        return $this->hasMany(Record::class, 'id');
    }

    public function Report()
    {
        return $this->hasMany(Report::class. 'id');
    }

}
