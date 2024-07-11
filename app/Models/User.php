<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $table = "user";
    protected $fillable = array("*");

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
        return $this->hasMany(sales::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, "service_users");
    }

    public function supplies()
    {
        return $this->belongsToMany(supply::class, "supply_users");
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
