<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Trainer
 *
 */
class Trainer extends User
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * The users that belong to the trainer.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The trainings that belong to the trainer.
     */
    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }

    /**
     * The learners that belong to the trainer.
     */
    public function learners(): BelongsToMany
    {
        return $this->belongsToMany(Learner::class);
    }

    /**
     * The subclients that belong to the trainer.
     */
    public function subclients(): BelongsToMany
    {
        return $this->belongsToMany(Subclient::class, 'trainer_subclient', 'trainer_id', 'subclient_id');
    }
}
