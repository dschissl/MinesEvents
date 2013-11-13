<?php

class AccountController extends BaseController {

    public function action_index()
    {

    }
    
	public function showNewAccount()
	{
		return View::make('newaccount');
	}

    public function showAccount() 
    {
        return View::make('account');
    }
}
