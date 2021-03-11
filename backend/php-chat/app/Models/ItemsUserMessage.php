<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsUserMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiving',
        'user_id',
        'message_id'
    ];
}
