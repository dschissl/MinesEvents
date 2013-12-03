<?php

class AccountController extends BaseController {

	public function showNewAccount()
	{
		return View::make('newaccount')->with('failed',"false");
	}

    public function showAccount() 
    {
		if (Auth::check()) {
			return View::make('account');
		}
		else {
			return Redirect::to('newaccount');
		}
    }
	
	public function action_createaccount() 
    {
		$name = Input::get('name');
		$email = Input::get('email');
        $password = Input::get('password');
		$validator = Validator::make(Input::all(), User::$rules);
		
		if ($validator->passes()) {
			try {
                $user = new User;
                $user->name = $name;
                $user->email = $email;
                $user->password = Hash::make($password);
                $user->save();
			} 
            catch(Exception $e) {
                return View::make('newaccount')->with('failed',"true");
			}
			Auth::attempt(array('email' => $email, 'password' => $password));
			return View::make('accountcreated');
		} 
        else {
			return Redirect::to('newaccount')->withErrors($validator)->withInput();
		}
	}
	
    public function action_authenticate()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::intended('/');
		}
		else {
			return Redirect::intended('/')->with('loginMessage', 'Invalid Login'); 
		}
		
	}
	public function action_logout(){
		Auth::logout();
		return Redirect::intended('/');
	}

	public function action_changepassword(){
		$validator = Validator::make(Input::all(), User::$ruleschangepassword);
		$password = Input::get('password');
		$old = Input::get('oldpass');
		if (Hash::check($old,Auth::user()->password)){
			if ($validator->passes()) {
				DB::table('users')->where('user_id', '=', Auth::user()->user_id)->update(array('password' => Hash::make($password)));
				return View::make('passwordChanged');
			}else{
				return Redirect::to('account')->withErrors($validator);
			}
		}else{
			return View::make('account')->with('wrong',"true");
		}
	}
	
    public function action_deleteaccount() {
        if (Auth::check()) {
			DB::table('users')->where('user_id', '=', Auth::user()->user_id)->delete();
			DB::table('events')->where('user_id', '=', Auth::user()->user_id)->delete();
            Auth::logout(); 
        }
        return Redirect::intended('/');
    }
}
