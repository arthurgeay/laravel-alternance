<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Define name and attributes of this model
    protected $name = 'applications';
    protected $fillable = [
        'description',
        'contact_type',
        'state',
        'user_id',
        'company_id',
        'contact_id'
    ];

    // Specifies that an application is related to a company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Specifies that an application is related to a contact
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }


}
