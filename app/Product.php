<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey='product_id';
    public $timestamps = false;

    protected $fillable=['product_id', 'name', 'description', 'price', 'date_available','amount','size','last_update',
        'weight','product_type_product_type_id','product_status_product_status_id','customer_customer_id'];

}
