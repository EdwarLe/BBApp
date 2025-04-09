<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrintProcess extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_paper_type_process',
        'quantity',
        'unit_cost',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "print_process_users");
    }
}
