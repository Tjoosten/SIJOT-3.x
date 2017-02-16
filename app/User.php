<?php

namespace Sijot;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Sijot\User
 *
 * @property        int                 $id              The Auto Increment identifier in the database.
 * @property        string              $name            The first and lastname for the user.
 * @property        string              $avatar          The user profile picture.
 * @property        string              $email           The user email. This field is also unique.
 * @property        string              $password        The user given password encrypted with Bcryp algorithm.
 * @property        string              $remember_token  The remember token in the database for the user.
 * @property        string              $deleted_at      Timestamp for the data row deletion.
 * @property        \Carbon\Carbon      $created_at      Timestamp for the data row creation.
 * @property        \Carbon\Carbon      $updated_at      Timestamp for the last modify on the data row.
 *
 * @property-read   \Sijot\Theme        $status          The theme data relation. (1:1)
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'avatar', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // TODO: Implement theme relation.
}
