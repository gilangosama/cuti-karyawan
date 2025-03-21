<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $fillable = ['user_id', 'no_badge', 'divisi', 'join_date', 'jenis'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
