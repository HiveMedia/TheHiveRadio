<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'role'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @param $role
     */

    /*
     * ROLE SYSTEM
     *
     *  Admins can:
     *  * Add Users
     *  * Add shows
     *  * Edit schedule
     *
     * ShowHosts can:
     * * Edit their Show
     * * Cancel their Show
     * * Add members to Show
     * * Post to blog
     *
     * ShowHosts can:
     * * Edit their Show
     * * Cancel their Show
     * * Add members to Show
     * * Post to blog
     *
     *
     * Editor can:
     * * Edit blog posts
     * * Post to blog
     *
     * Commenter can:
     * * Comment on posts
     * * That's it
     */
    public function IsRole($role){
        switch ($role)
        {
            case 'Admin': // Satan level power
                if ($this->role == 'Admin')
                {
                    return true;
                }
            case 'showHost': // Cancel their Show, Post to Blog
                if ($this->role == 'Admin' || $this->role == 'showHost')
                {
                     return true;
                 }
            case 'showStaff': // Edit their own Show
                if ($this->role == 'Admin' || $this->role == 'showHost'|| $this->role == 'showStaff')
                {
                    return true;
                }
            case 'Editor': // Blog Stuff
                if ($this->role == 'Admin' || $this->role == 'showHost' || $this->role == 'Editor')
                {
                    return true;
                }
            case 'Commenter': // Blog Stuff
                if ($this->role == 'Admin' || $this->role == 'showHost' || $this->role == 'Editor')
                {
                    return true;
                }
        }
        return false;
    }

}
