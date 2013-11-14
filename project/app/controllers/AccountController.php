<?php

class AccountController extends BaseController {

	public function showNewAccount()
	{
		return View::make('newaccount')->with('failed',"false");;
	}

    public function showAccount() 
    {
        return View::make('account');
    }
	
	public function action_createaccount() 
    {
		$name = Input::get('name');
		$email = Input::get('email');
        $password = Input::get('password');
		$confirmpassword = Input::get('confirmpassword');
		
		try {
		$user = new User;
		$user->name = $name;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();
		}catch( Exception $e ) {
                return View::make('newaccount')->with('failed',"true");
        }
        return View::make('accountcreated');
    }
	
	 public function action_authenticate()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::intended('/');
		}
		else{
			//stub
		}
		
	}
	
}
