<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role'
    ];

    public function miscellaneous()
    {
        return $this->belongsToMany(Miscellaneous::class, "miscellaneous_users");
    }

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, "quotation_users");
    }

    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, "service_users");
    }

    public function supplies()
    {
        return $this->belongsToMany(Supply::class, "supply_users");
    }

    public function workdays()
    {
        return $this->belongsToMany(Workday::class, "user_workdays");
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }
}
