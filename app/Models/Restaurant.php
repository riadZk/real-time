<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'cover',
        'logo',
        'story',
        'currency',
        'wifi_password',
        'address',
        'user_id',
        'is_selected',
        'wifi_name',
        'TVA'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }



}