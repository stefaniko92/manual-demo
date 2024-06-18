<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerBehaviour extends Model
{
    use HasFactory;

    const ACTION_EXCLUDE_ALL = 'exclude_all';
    const ACTION_NAVIGATE  = 'navigate';
    const ACTION_RECOMMEND = 'recommend';

    protected $fillable = ['answer_id','subject_type', 'subject_id', 'action'];
    protected $casts    = [
        'answer_id' => 'integer',
        'subject_type' => 'string',
        'subject_id' => 'integer',
        'type' => 'string'
    ];

    /**
     * Get the owning subject model (product or question).
     */
    public function subject()
    {
        return $this->morphTo();
    }
}
