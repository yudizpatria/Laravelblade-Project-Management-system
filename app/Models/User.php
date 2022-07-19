<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'image', 'gender', 'status'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = ['created_at'];

    public function employee()
    {
        return $this->hasMany(EmployeeDetails::class, 'user_id');
    }

    public function client()
    {
        return $this->hasMany(ClientDetails::class, 'user_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }
}
