<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sijot\Activity
 *
 * @property        int                  $id                 The Auto Increment identifier in the database.
 * @property        int                  $creator_id         The relation key for the relation (1:1).
 * @property        int                  $status_id          The relation key for the status relation. (1:1).
 * @property        string               $heading            The group heading.
 * @property        string               $sub_heading        The group sub heading.
 * @property        string               $description        The group decription.
 * @property        \Carbon\Carbon       $deleted_at         The delete timestamp for the lease.
 * @property        \Carbon\Carbon       $created_at         Timestamp for last modifications on the data.
 * @property        \Carbon\Carbon       $updated_at         Timestamp for the creation data from the data row.
 *
 * @property-read   \Sijot\User          $creator            Creator information relation for the activity. (1:1)
 * @property-read   \Sijot\Branch        $group              Group data relation for the activity (1:N).
 * @property-read   \Sijot\RentalStatus  $status             The status information relation for the activity. (1:1)
 */
class Activity extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['creator_id', 'status_id', 'heading', 'sub_heading', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function group()
    {
        return $this->belongsToMany(Branch::class)
            ->withTimestamps();
    }

    /**
     * The creator information relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * The status information relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(RentalStatus::class, 'status_id');
    }
}
