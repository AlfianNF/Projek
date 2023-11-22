<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'uid', 'server', 'nominal', 'nama_nominal'];
    
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'game_id');
    }

    public function nominal()
    {
        return $this->belongsTo(TopupNominal::class, 'nominal_id', 'nominal_id');
    }
}
