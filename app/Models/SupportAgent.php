<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SupportAgent extends Authenticatable
{
    use HasFactory;

    protected $table = 'support_agents'; // Add this line

    protected $fillable = [
        'username',
        'password',
    ];
}
