<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    public $timestamps = false;

    protected $fillable=['address_id', 'street', 'zip','customer_customer_id','address_type_address_type_id'];

}
