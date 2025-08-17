<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'exercise_set_id',
        'duration',
        'completed_at',
        'notes',
    ];

    /**
     * Get the user that belongs to the workout log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exercise that belongs to the workout log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * Get the exercise set that belongs to the workout log.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exerciseSet()
    {
        return $this->belongsTo(ExerciseSet::class);
    }
}
