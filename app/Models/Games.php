<?php

namespace App\Models;

use App\Models\TopupNominals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Faker\Generator as Faker;

class Games extends Model
{
    use HasFactory;
    protected $fillable = ['game_name', 'game_slug'];
}
