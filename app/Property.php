<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'action'
    ];

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }
}
