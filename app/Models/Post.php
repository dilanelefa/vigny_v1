<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

    public $fillable = ['title', 'description', 'content', 'cover', 'slug', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDayDateString();
    }

    public function getCoverAttribute($cover){
        return 'storage/'.$cover;
    }
}
