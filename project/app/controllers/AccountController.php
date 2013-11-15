<?php

class AccountController extends BaseController {

	public function showNewAccount()
	{
		return View::make('newaccount')->with('failed',"false");;
	}

    public function showAccount() 
    {
		if(Auth::check()){
			return View::make('account');
		}
		else{
			return Redirect::to('newaccount');
		}
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
		Auth::attempt(array('email' => $email, 'password' => $password));
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
			return Redirect::intended('/'); 
		}
		
	}
	public function action_logout(){
		Auth::logout();
		return Redirect::intended('/');
	}
	
}
