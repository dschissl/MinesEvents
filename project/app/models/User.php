<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	//For user id authentication with user_id instead of id
	protected $primaryKey = 'user_id';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	 public $timestamps = false;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	
	//Rules for validation
	public static $rules = array(
		'name' => 'required',	//removed the alpha tag because it does not allow spaces to be in names. Upon doing research, it is basically recommended to just not validate names, because they could have special characters for foreign names and stuff
		'email' => 'required|email',
		'password' => 'required|confirmed|between:4,32',
		'password_confirmation' => 'required',	//removed between tag because it looks strange if you have an invalid length password, because it tells you in two places. Confirmation password must match, so it doesnt matter how long it must be
	);

public static $ruleschangepassword = array(
		'password' => 'required|confirmed|between:4,32',
		'password_confirmation' => 'required',
	);
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
