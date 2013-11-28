<?php

class EventController extends BaseController {

    public function action_index()
    {

    }
    
	public function showNewEvent()
	{
		if (Auth::check()) {
			return View::make('newevent');
		}
		else {
			return Redirect::to('newaccount');
		}
	}
	
	public function showEventCreated(){
		return View::make('eventcreated');
	}

    public function showDetail($id) 
    {
        return View::make('eventdetail')->with('id', $id);
    }
}
