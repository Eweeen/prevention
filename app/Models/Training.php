<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string|null $observation
 * @property string $name
 * @property int|null $seance_code
 * @property int $offer_id
 * @property int $center_id
 * @property int $trainer_id
 * @property int $user_id_trainer
 * @property int $user_id_learner
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Center|null $center
 * @property-read Collection|Criterion[] $criteria
 * @property-read int|null $criteria_count
 * @property-read User|null $learners
 * @property-read Offer|null $offers
 * @property-read User|null $trainers
 * @property-read Vehicle|null $vehicles
 * @method static CourseFactory factory(...$parameters)
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereCenterId($value)
 * @method static Builder|Course whereCreatedAt($value)
 * @method static Builder|Course whereId($value)
 * @method static Builder|Course whereObservation($value)
 * @method static Builder|Course whereOfferId($value)
 * @method static Builder|Course whereSeanceCode($value)
 * @method static Builder|Course whereUpdatedAt($value)
 * @method static Builder|Course whereUserIdLearner($value)
 * @method static Builder|Course whereUserIdTrainer($value)
 * @method static Builder|Course whereVehicleId($value)
 * @property string $date
 * @property-read Collection|Course[] $courses
 * @property-read int|null $courses_count
 * @method static Builder|Training whereDate($value)
 */
class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'seance_code'
    ];

    /**
     * The offer that the course has.
     *
     * @return BelongsTo
     */
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    /**
     * The center that the training belongs to.
     *
     * @return BelongsTo
     */
    public function center(): BelongsTo
    {
        return $this->belongsTo(Center::class);
    }

    /**
     * The trainer that the training has.
     *
     * @return BelongsTo
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    /**
     * The learners that the training has.
     *
     * @return BelongsToMany
     */
    public function learners(): BelongsToMany
    {
        return $this->belongsToMany(Learner::class, 'training_learner', 'training_id', 'learner_id');
    }

    /**
     * The courses that belong to the training.
     *
     * @return HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the subclients of learners associated with the training.
     *
     * @return Collection
     */
    public function subclients(): Collection
    {
        return $this->learners->map(function($learner) {
            return $learner->subclient;
        });
    }

}
