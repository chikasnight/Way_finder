<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewLocation extends Model
{
    use HasFactory,  Notifiable;

    protected $fillable = [
        'user_id',
        'location_name',
        'location_state',
        'directions',
        'image',
        'disk'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
