<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 */
class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    protected $fillable = [
        'shop_name', 'proprietor_name', 'mobile', 'email', 'address', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
