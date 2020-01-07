<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasRoles;

    const TYPE_CLIENT = 'client';
    const TYPE_CANDIDATE = 'candidate';
    const TYPE_ADMIN = 'admin';
    const TYPE_SUPERADMIN = 'superadmin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'role'
    ];

    /**
     * @return HasOne
     */
    public function resume(): HasOne
    {
        return $this->hasOne(Resume::class, 'user_id');
    }

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'applicant_id');
    }

    /**
     * @return void
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getRoleAttribute()
    {
        return $this->roles()->pluck('name');
    }
}