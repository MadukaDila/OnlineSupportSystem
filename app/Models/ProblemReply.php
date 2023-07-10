<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemReply extends Model
{
    protected $table = 'problem_reply';
    protected $fillable = [
        'ticket_id', 'reply'
    ];
}
