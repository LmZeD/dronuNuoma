<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'gender';
    protected $fillable=['id','name'];
}
