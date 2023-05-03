<?php

namespace BiztechEG\laravelBostaIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class PackageState extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'state_code',
        'state_value',
        'types'
    ];
}
