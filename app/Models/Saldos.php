<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldos extends Model
{
    use HasFactory;

    protected $fillable = ['saldo','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
