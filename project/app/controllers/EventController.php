<?php

class EventController extends BaseController {

    public function action_index()
    {

    }
    
	public function showNewEvent()
	{
		return View::make('newevent');
	}

    public function showDetail($id) 
    {
        return "id = ".$id;
    }
}