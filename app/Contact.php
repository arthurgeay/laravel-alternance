<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Define name and attributes of the model
    protected $name = 'contact';
    protected $fillable = [
        'fullname',
        'jobname',
        'mail',
        'phone',
        'company_id'
    ];

    // Remove "updated_at" and "created_at" column
    public $timestamps = false;

    // Specifies that a contact belongs to a company
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
