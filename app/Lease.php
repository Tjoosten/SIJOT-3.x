<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Sijot\Lease
 *
 * @property        int             $id                 Auto Increment in the database.
 * @property        string          $rental_status_id   The status identifier for the lease status.
 * @property        string          $group_name         The group name for the lease.
 * @property        string          $email_address      The email address for the group.
 * @property        string          $phone_number       The phone number for the group.
 * @property        \Carbon\Carbon  $end_date           The end date for the lease.
 * @property        \Carbon\Carbon  $start_date         The start date for the lease.
 * @property        \Carbon\Carbon  $deleted_at         The delete timestamp for the lease.
 * @property        \Carbon\Carbon  $created_at         Timestamp for last modifications on the data.
 * @property        \Carbon\Carbon  $updated_at         Timestamp for the creation data from the data row.
 *
 * @property-read   \Sijot\RentalStatus $status         The rental status data relation. (1:1)
 */
class Lease extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['rental_status_id', 'end_date', 'start_date', 'email_address', 'group_name', 'phone_number'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['end_date', 'start_date'];

    /**
     * Format the timestamp format.
     *
     * @param  string $date The start time from the form
     * @return string
     */
    public function setStartDateAttribute($date)
    {
        // Use with Carbon instance:
        // -------
        // Carbon::createFromFormat('H:i', $date)->format('H:i');
        return $this->attributes['start_date'] = strtotime(str_replace('/', '-', $date));
    }
    /**
     * Format the timestamp format.
     *
     * @param  string $date The start time from the form
     * @return string
     */
    public function setEndDateAttribute($date)
    {
        // Use with Carbon instance:
        // -------
        // Carbon::createFromFormat('H:i', $date)->format('H:i');
        return $this->attributes['end_date'] = strtotime(str_replace('/', '-', $date));
    }

    /**
     * Status relationship. Used to indicate the lease status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(RentalStatus::class, 'rental_status_id');
    }
}
