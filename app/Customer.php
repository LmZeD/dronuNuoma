<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $table = 'customer';

    protected $fillable=['customer_id', 'first_name', 'last_name', 'email', 'gender_gender_id','birth_date','phone','password'];

    protected $hidden=['password'];
}

