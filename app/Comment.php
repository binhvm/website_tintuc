<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TinTuc;
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
    	return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
}
