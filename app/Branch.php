<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sijot\branch
 *
 * @property      int              $id              The Auto Increment identifier in the database.
 * @property      string           $selector        The data selector for the database.
 * @property      string           $sub_heading     The sub heading for the group information.
 * @property      string           $heading         The description title.
 * @property      string           $description     The group description
 * @propertt      string           $image_path      The group icon.
 * @property      \Carbon\Carbon   $deleted_at      Timestamp for the data row deletion.
 * @property      \Carbon\Carbon   $created_at      Timestamp for the data row creation.
 * @property      \Carbon\Carbon   $updated_at      Timestamp for the last modify on the data row.
 *
 * @property-read \Sijot\Activity  $activities      The activity data relation for the group (1:N)
 */
class Branch extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign field.
     *
     * @var array
     */
    protected $fillable = ['selector', 'sub_heading', 'heading', 'description'];

    /**
     * The activity data relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class)
            ->withTimestamps();
    }
}
