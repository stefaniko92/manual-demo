<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerRestriction extends Model
{
    use HasFactory;

    const ACTION_EXCLUDE_ONE = 'exclude_one';
    const ACTION_EXCLUDE_ALL = 'exclude_all';

    protected $fillable = ['answer_id','subject_type', 'subject_id', 'action'];

    /**
     * Get the owning subject model (product or question).
     */
    public function subject()
    {
        return $this->morphTo();
    }
}
