<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'shop_name', 'proprietor_name', 'email','mobile', 'address', 'shop_image', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lastMonthOrder(): HasMany
    {
        $currentDate = Carbon::now();
        $oneMonthAgo = Carbon::parse($currentDate)->subYear();
        return $this->hasMany(Invoice::class)->where('created_at', '>', $oneMonthAgo);
    }
}
