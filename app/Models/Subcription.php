<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
