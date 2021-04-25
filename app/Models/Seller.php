<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 * @method static findOrFail(int|string|null $id)
 */
class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    protected $fillable = [
        'shop_name', 'proprietor_name', 'email','mobile', 'address', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
