<?php

namespace App\Models;

use App\Helpers\MP3File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    public $hidden = ['created_at', 'updated_at', 'reader_id', 'surah_id', 'remembrance_id', 'dua_id', 'surah', 'remembrance', 'dua'];
    use HasFactory;

    protected $appends = [
        'name_ar',
        'name_en',
        'image',
    ];

    protected $fillable = ['listen', 'duration', 'listen', 'like'];

    public static function booted()
    {
        static::creating(function($model){
            $mp3File = new MP3File(storage_path('app/public/' . $model->sound_clip));
            $duration = MP3File::formatTime($mp3File->getDurationEstimate());
            $model->duration = $duration;
        });
        
        static::updating(function($model){
            $mp3File = new MP3File(storage_path('app/public/' . $model->sound_clip));
            $duration = MP3File::formatTime($mp3File->getDurationEstimate());
            $model->duration = $duration;
        });
    }


    public function getNameArAttribute() {
        if ($this->surah) return $this->surah->name_ar;
        if ($this->dua) return $this->dua->name_ar;
        if ($this->remembrance) return $this->remembrance->name_ar;

    }

    public function getNameEnAttribute() {
        if ($this->surah) return $this->surah->name_en;
        if ($this->dua) return $this->dua->name_en;
        if ($this->remembrance) return $this->remembrance->name_en;
    }

    public function getImageAttribute() {
        if ($this->reader)
            return $this->reader->image;
        elseif ($this->remembrance)
            return $this->remembrance->image;
        elseif ($this->dua)
            return $this->dua->image;
    }


    public function surah() {
        return $this->belongsTo(Surah::class);
    }
    public function reader() {
        return $this->belongsTo(Reader::class);
    }
    public function remembrance() {
        return $this->belongsTo(Remembrance::class);
    }
    public function dua() {
        return $this->belongsTo(Dua::class);
    }

    public function listeners () {
        return $this->hasMany(Listener::class);
    }

    public function notification()
    {
        return $this->morphMany(Notification::class, 'notificationable');
    }
}
