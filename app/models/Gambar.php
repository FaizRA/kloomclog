<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    //
    //
    protected $table = 'gambar';
    public $timestamps = false;
    protected $guarded = [];
/*
    public function clog()
{
    return $this->belongsTo('App\models\Clog');
}
*/
}
