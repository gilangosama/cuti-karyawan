<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jenis', 'start', 'end', 'alamat', 'foto', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cutiApproval()
    {
        return $this->hasMany(CutiApproval::class);
    }

}
