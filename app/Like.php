<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;

class Like extends Model
{
    protected $table = "likes";
    protected $fillable = [ 'idUser', 'idTinTuc', ];
    const liked = 1;
    const notlike = 0;

    public function tintuc()
    {
    	return $this->belongsTo(News::class, 'idTinTuc', 'id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
