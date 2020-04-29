<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $name = 'company';
    protected $fillable = [
        'name',
        'area_activity',
        'address',
        'email',
        'phone'
    ];

    public $timestamps = false;

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}

