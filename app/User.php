<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * @return string
	 */
	public static function generatePassword(){
	    return bcrypt( str_random( 35 ) );
    }

	/**
	 * @param $user
	 */
	public static function sendWelcomeEmail($user)
	{
		// Generate a new reset password token
		$token = app('auth.password.broker')->createToken($user);

		// Send email
		Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
			$m->from('hello@ll5.ngrok.io', 'L5.3 Blog');
			$m->to($user->email, $user->name)->subject('Welcome to L5.3 Blog');
		});
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles(){
	    return $this->hasMany( 'App\Article' );
    }

}
