<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dua extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'name_en' , 'name_ar'];

    public function sound () {
        return $this->hasOne(Sound::class);
    }

}
