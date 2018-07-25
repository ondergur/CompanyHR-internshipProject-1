<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'companyid',
        'logo',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyid');
    }
}
