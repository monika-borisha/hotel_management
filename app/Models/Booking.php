<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Booking extends Model
{
    use HasFactory;

    protected $fillable  = [
        'room_id',
         'name',
        'email',
        'contact',
        'check_in',
        'check_out'
    ];

    public function room()
    {
        return $this->hasOne(Room::class,'id', 'room_id');
    }
}
