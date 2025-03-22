<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
    protected $fillable = ['user_id', 'no_badge', 'section', 'position', 'join_date', 'jenis', 'kouta'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
