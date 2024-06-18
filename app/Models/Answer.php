<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'text',
        'sort_order'
    ];

    protected $casts = [
        'question_id' => 'integer',
        'text' => 'string',
        'sort_order' => 'integer'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function behaviours()
    {
        return $this->hasMany(AnswerBehaviour::class);
    }

    public function restrictions()
    {
        return $this->hasMany(AnswerRestriction::class);
    }
}
