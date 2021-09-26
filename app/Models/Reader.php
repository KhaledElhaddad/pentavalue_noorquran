<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['recitation', 'listens_count'];

    public function getRecitationAttribute()
    {
        return $this->sound()->count();
    }

    public function notification()
    {
        return $this->morphMany(Notification::class, 'notificationable');
    }

    public function sound()
    {
        return $this->hasMany(Sound::class);
    }

    public function listens()
    {
        return $this->hasManyThrough(Listener::class, Sound::class);
    }
    
    public function getListensCountAttribute()
    {
        return $this->listens()->count();
    }
}
