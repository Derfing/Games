<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tic_Tac extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class,'id');
    }

    protected $table = 'toe_game';
    protected $fillable = [
        'player_1',
        'player_2',
        'winner',
        'hist'
    ];
}
