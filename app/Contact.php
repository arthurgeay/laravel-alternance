<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $name = 'contact';
    protected $fillable = [
        'fullname',
        'jobname',
        'mail',
        'phone',
        'company_id'
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
