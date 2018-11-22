<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    //
    //protected $table = 'hotels';
 protected  $fillable = ['id','hotel_name','rate'];
    /**
     * @param string $table
     */

    public $timestamps = false;
}
