<?php

namespace App\Models;

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

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getTableHeaders()
    {
        return ['ID','Nome','Autor'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
                break;
            case 'Autor':
                return $this->author->name;
                break;
            case 'Nome':
                return $this->title;
                break;
        }
    }
}
