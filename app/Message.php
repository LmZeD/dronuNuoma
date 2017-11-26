<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey='id';
    public $timestamps = false;

    protected $fillable=['id','customer_id','message','created_at','answered_at','answered'];

}
