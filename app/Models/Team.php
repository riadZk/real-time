<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Team extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'gender',
        'email',
        'username',
        'phone',
        'picture',
        'role_id',
        'restaurant_id',
        'otp',
        'otp_expiration',
        'email_verified_at'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}