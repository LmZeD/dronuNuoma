<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey='image_id';
    public $timestamps = false;

    protected $fillable=['image_id','alt','src','product_product_id'];

}
