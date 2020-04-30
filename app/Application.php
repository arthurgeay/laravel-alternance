<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $name = 'applications';
    protected $fillable = [
        'description',
        'contact_type',
        'state',
        'user_id',
        'company_id',
        'contact_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }


}
