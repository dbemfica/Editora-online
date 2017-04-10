<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


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
                return $this->name;
                break;
        }
    }
}
