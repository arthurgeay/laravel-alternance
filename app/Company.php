<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Define name and attributes of this model
    protected $name = 'company';
    protected $fillable = [
        'name',
        'area_activity',
        'address',
        'email',
        'phone',
        'img'
    ];

    // Remove "updated_at" and "created_at" column
    public $timestamps = false;

    // Specifies that a company has many contacts
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

