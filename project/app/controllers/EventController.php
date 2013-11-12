<?php

class EventController extends BaseController {

    public function action_index()
    {

    }
    
	public function showNewEvent()
	{
		return View::make('newevent');
	}
	
	public function showEventCreated(){
		return View::make('eventcreated');
	}

    public function showDetail($id) 
    {
        return View::make('eventdetail')->with('id', $id);
    }
}