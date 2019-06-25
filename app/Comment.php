<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;

class Comment extends Model
{
    //
    protected $table = "comment";
    protected $fillable = [
        'idUser', 'idTinTuc', 'NoiDung',
    ];

    public function tintuc()
    {
    	return $this->belongsTo('App\News', 'idTinTuc', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
