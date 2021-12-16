<?php

namespace App\Models;

use \App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'media',
        'caption'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
