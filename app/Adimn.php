<?php

namespace App;
use Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;
class Adimn extends Authenticatable
{
    protected $table = 'admins';
    protected $guarded = array();
    protected $fillable = [
        'name', 'email', 'password',
    ];


    public function isSuperAdmin() : bool
    {
        return (bool) $this->is_super_admin;
    }

    /**
     * Create admin.
     *
     * @param array $details
     * @return array
     */
    public function createSuperAdmin(array $details) : self
    {
        $user = new self($details);

        if (! $this->superAdminExists()) {
            $user->is_super_admin = 1;
        }

        $user->save();

        return $user;
    }

    /**
     * Checks if super admin exists
     *
     * @return integer
     */
    public function superAdminExists() : int
    {
        return self::where('is_super_admin', 1)->count();
    }

}
