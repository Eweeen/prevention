<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string|null $observation
 * @property int|null $seance_code
 * @property int $offer_id
 * @property int $vehicle_id
 * @property int $center_id
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
 * @property int $training_id
 * @property-read Training|null $trainings
 * @method static Builder|Course whereTrainingId($value)
 */
class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'observation',
    ];

    /**
     * Get the training that the course belongs to.
     *
     * @return BelongsTo
     */
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }

    /**
     * Get the grid that the course belongs to.
     *
     * @return BelongsTo
     */
    public function grid(): BelongsTo
    {
        return $this->belongsTo(Grid::class);
    }
}

