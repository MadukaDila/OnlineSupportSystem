<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'customer_name', 'problem_description', 'email', 'phone_number', 'reference_number', 'status'
    ];
}
