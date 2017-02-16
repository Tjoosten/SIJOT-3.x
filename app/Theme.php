<?php

namespace Sijot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Sijot\Theme
 *
 * @property int              $id              The Auto Increment identifier in the database.
 * @property string           $name            The name for the theme.
 * @property string           $class           The CSS main class for the theme.
 * @property string           $deleted_at      Timestamp for the data row deletion.
 * @property \Carbon\Carbon   $created_at      Timestamp for the data row creation.
 * @property \Carbon\Carbon   $updated_at      Timestamp for the last modify on the data row.
 */
class Theme extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'class'];
}
