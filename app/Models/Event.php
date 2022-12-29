<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'start_date', 'end_date', 'start_time', 'url', 'user_id', 'longitude', 'latitude'];

    public function images() {
      return $this->hasMany(EventImage::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
