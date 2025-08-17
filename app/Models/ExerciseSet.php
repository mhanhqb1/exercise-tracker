<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rest_time',
        'is_active',
        'created_by',
    ];

    /**
     * Get the user who created the exercise set.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the exercises that belong to the exercise set.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exercises()
    {
        return $this->belongsToMany(
            Exercise::class,
            'exercise_set_items'
        )->withPivot(['order_no', 'reps', 'duration'])
         ->withTimestamps()
         ->orderBy('pivot_order_no');
    }

    /**
     * Get the workout logs for the exercise set.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workoutLogs()
    {
        return $this->hasMany(WorkoutLog::class);
    }
}
