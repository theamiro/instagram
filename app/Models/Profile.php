<?php

namespace App\Models;

use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'displayName',
        'hyperlink',
        'profilePicture',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profilePicture() {
        $imagePath = ($this->profilePicture) ? '/storage/' . $this->profilePicture : '/images/placeholder.jpeg';
        return $imagePath;
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
