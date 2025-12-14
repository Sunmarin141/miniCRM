<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Workers extends Authenticatable
{
    use HasApiTokens,Notifiable,HasFactory;

    protected $table = 'workers';

    protected $guarded = [];
}
