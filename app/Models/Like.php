<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
}
