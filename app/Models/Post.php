<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'age_bracket',
        'education_level',
        'employment_status',
        'meals_before',
        'meals_during',
        'shelterDisturbance',
        'disagreements',
        'disrespect',
        'fighting',
        'quarrels',
        'seperation',
        'emotional_distress',
        'outcomeBehaviours',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
