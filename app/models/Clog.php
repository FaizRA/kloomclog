<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clog extends Model
{
    //
    protected $table = 'clog';
    public $timestamps = false;
    protected $guarded = [];
/*
    public function gambar()
{
    return $this->hasMany('App\models\Gambar');
}
*/

}
