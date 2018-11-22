<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomModel extends Model
{
    //
    protected  $fillable = ['hotel_id','id','room_code'];

    public $timestamps = false;
}
