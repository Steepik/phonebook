<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone_book extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'middlename',
        'tel'
    ];
}
