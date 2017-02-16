<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sijot\RentalStatus
 *
 * @property int            $id             Auto Increment identifier entity in the database.
 * @property string         $name
 * @property string         $table_class    CSS class used for the status table rows.
 * @property string         $label_class    CSS class used for the status labels.
 * @property string         $description    Description entity for the status description.
 * @property string         $deleted_at     Timestamp for the data row deletion.
 * @property \Carbon\Carbon $created_at     Timestamp for the data row creation.
 * @property \Carbon\Carbon $updated_at     Timestamp for the last modify on the data row.
 */
class RentalStatus extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'label_class', 'table_class', 'description'];
}
