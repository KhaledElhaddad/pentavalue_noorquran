<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'notificationable_id'];
    
    public function notificationable ()
    {
        return $this->morphTo();
    }
}
