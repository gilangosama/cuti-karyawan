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
        'position',
        'department',
        'join_date'
    ];

    protected $dates = [
        'join_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
