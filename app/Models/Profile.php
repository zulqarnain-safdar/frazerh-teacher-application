<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $casts = [
    'subjects_taught' => 'array',
    'languages' => 'array',
    'qualifications' => 'array',
    ];


    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'profile_id','id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'profile_id','id')->orderBy('id','desc');
    }
}
