<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','price','subtitle'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
