<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Grid
 *
 * @property int $grid_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Course[] $courses
 * @property-read int|null $courses_count
 * @property-read Collection|Criterion[] $criteria
 * @property-read int|null $criteria_count
 * @method static Builder|Grid newModelQuery()
 * @method static Builder|Grid newQuery()
 * @method static Builder|Grid query()
 * @method static Builder|Grid whereGridId($value)
 * @method static Builder|Grid whereName($value)
 * @method static Builder|Grid whereCreatedAt($value)
 * @method static Builder|Grid whereUpdatedAt($value)
 */
class Grid extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the courses that belong to this grid.
     *
     * @return HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'grid_id');
    }

    /**
     * The criteria that belong to the grid.
     *
     * @return BelongsToMany
     */
    public function criteria(): BelongsToMany
    {
        return $this->belongsToMany(Criterion::class, 'grid_criterion', 'grid_id', 'criterion_id');
    }

    /**
     * Get the client that belong to this grid.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
