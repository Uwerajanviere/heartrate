<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeartRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'heart_rate',
        'timestamp',
        'user_id'
    ];

    protected $casts = [
        'timestamp' => 'datetime',
        'heart_rate' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
} 