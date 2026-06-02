<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name',
        'patient_no',
        'age',
        'gender',
        'diagnosis',
        'doctor_assigned',
        'status',
        'admission_date',
        'notes',
    ];

    protected $casts = [
        'admission_date' => 'date'
    ];
}