<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSetItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_set_id',
        'exercise_id',
        'order_no',
        'reps',
        'duration',
        'is_active',
    ];

    /**
     * Get the exercise set that belongs to the exercise set item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exerciseSet()
    {
        return $this->belongsTo(ExerciseSet::class);
    }

    /**
     * Get the exercise that belongs to the exercise set item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
