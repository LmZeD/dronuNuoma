<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $table = 'product_status';
    public $timestamps = false;

    protected $fillable=['product_status_id','name','description'];

}
