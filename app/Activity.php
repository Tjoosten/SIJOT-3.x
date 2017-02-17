<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sijot\Activity
 *
 * @property        int                  $id                 The Auto Increment identifier in the database.
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

    public function creator()
    {

    }

    public function status()
    {

    }
}
