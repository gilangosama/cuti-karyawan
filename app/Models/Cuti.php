<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_registrasi',
        'jenis_cuti',
        'start_date',
        'end_date',
        'total_days',
        'address',
        'status',
        'approval1_id',
        'approval2_id',
        'hrd_id',
        'doctor_letter',
        'supporting_letter'
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approval1()
    {
        return $this->belongsTo(User::class, 'approval1_id');
    }

    public function approval2()
    {
        return $this->belongsTo(User::class, 'approval2_id');
    }

    public function hrd()
    {
        return $this->belongsTo(User::class, 'hrd_id');
    }

    public function cutiApproval()
    {
        return $this->hasMany(CutiApproval::class);
    }
}
