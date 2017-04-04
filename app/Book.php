<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
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

    public function getTableHeaders()
    {
        return ['ID','Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
                break;
            case 'Nome':
                return $this->title;
                break;
        }
    }
}
