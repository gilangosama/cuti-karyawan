<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiApproval extends Model
{
    protected $table = 'cuti_approvals';
    protected $fillable = ['user_id', 'cuti_id', 'status', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cuti()
    {
        return $this->belongsTo(Cuti::class);
    }
}
