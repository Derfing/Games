<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossCheckers extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    protected $table = 'cross_checkers';
    protected $fillable = [
        'player_1',
        'player_2',
        'winner',
        'hist'
    ];
}
