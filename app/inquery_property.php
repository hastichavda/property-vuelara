<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inquery_property extends Model
{
    protected $table = 'inquery_property';

    protected $fillable = [
        'inquery_id',
        'property_id'
    ];
}
