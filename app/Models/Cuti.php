<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start', 'end', 'description', 'status', 'approval_1', 'approval_2'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
