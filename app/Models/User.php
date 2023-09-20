<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role',
        'default_address_id',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
