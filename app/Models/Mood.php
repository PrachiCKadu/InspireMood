<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    /** @use HasFactory<\Database\Factories\MoodFactory> */
    public function user() {
    return $this->belongsTo(User::class);
}

    protected $fillable = ['user_id', 'mood', 'note'];


    use HasFactory;
}
