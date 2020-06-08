<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsTo('App\Author','authors_id','id');
        //параметр 'authors_id' - для связанной таблицей (внешний ключ), 'id' - по какому параметру привязывается (?)
    }
}
