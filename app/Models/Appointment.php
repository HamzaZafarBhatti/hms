<?php

namespace App\Models;

use App\Enum\AppointmentEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'message',
        'phone',
        'date',
        'doctor_id',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function getStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => AppointmentEnum::getStatus($this->status)
        );
    }

    public function getDate(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => date('M d, Y', strtotime($this->date))
        );
    }
}
