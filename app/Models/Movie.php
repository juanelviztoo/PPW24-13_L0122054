<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'rating', 'production', 'director', 'release_date', 
        'age_restriction', 'playtime', 'description', 'status'
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function getFormattedPlaytimeAttribute()
    {
        $hours = intdiv($this->playtime, 60);
        $minutes = $this->playtime % 60;
        return sprintf('%dh %dm', $hours, $minutes);
    }
}