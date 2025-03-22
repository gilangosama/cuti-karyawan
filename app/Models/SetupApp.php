<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetupApp extends Model
{
    protected $table = 'setup_app';
    protected $fillable = ['cuti', 'izin', 'days'];
}
