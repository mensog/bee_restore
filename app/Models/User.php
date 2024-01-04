<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'role', 'full_name', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        // Добавляем свой класс.
        $this->notify(new ResetPassword($token));
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function privateAccount()
    {
        return $this->hasOne('App\Models\PrivateAccount');
    }

    public function hasRole($role)
    {
        $role = (array) $role;
        return in_array($this->role, $role);
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'store_id', 'partner_id');
    }

    public function lastOrder()
    {
        return $this->orders()->orderBy('id', 'desc')->first();
    }

    public function getAddress()
    {
        $lastOrder = $this->lastOrder();
        if ($lastOrder) {
            return $lastOrder->address;
        }
        return '';
    }

    public function getPhone()
    {
        $lastOrder = $this->lastOrder();
        if ($lastOrder) {
            return $lastOrder->phone;
        }
        return '';
    }

    public function routeNotificationForMail()
    {
        $lastOrder = $this->lastOrder();

        if ($lastOrder) {
            return $lastOrder->email;
        }
        return 'default@example.com';
    }
}
