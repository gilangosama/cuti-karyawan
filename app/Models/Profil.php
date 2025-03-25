<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';
    protected $fillable = [
        'user_id',
        'no_badge',
        'section',
        'position',
        'department',
        'join_date',
        'jenis'
    ];

    protected $dates = [
        'join_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
