<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'video_url',
        'image_url',
        'duration',
        'difficulty',
        'exercise_type_id',
        'equipment_id',
        'muscle_group_id',
        'calories',
        'is_active',
    ];

    /**
     * Get the exercise sets that belong to the exercise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exerciseSets()
    {
        return $this->belongsToMany(
            ExerciseSet::class,
            'exercise_set_items'
        )->withPivot(['order_no', 'reps', 'duration'])
         ->withTimestamps();
    }

    /**
     * Get the workout logs for the exercise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workoutLogs()
    {
        return $this->hasMany(WorkoutLog::class);
    }
}
