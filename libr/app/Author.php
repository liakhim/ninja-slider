<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'title', 'name'
    ];
    public function books()
    {
        return $this->hasMany('App\Book','authors_id');
        //параметр "authors_id" для связанной таблицы (внешний ключ)
    }
}
