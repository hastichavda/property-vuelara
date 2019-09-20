<?php

namespace App;

use App\Inquery;
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

    public function inqueries()
    {
        return $this->hasOne('App\Inquery');
    }
}
