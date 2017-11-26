<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey='id';
    public $timestamps = false;

    protected $fillable=['id','description','address','name','event_starts_at','event_ends_at'];
}
