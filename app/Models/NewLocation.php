<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewLocation extends Model
{
    use HasFactory;

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
