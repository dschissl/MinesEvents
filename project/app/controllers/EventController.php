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

	private function getDateTimeString($dateStr, $hours, $mins, $dayPartStr) {
        if ($dayPartStr == 'PM') {
            $hours = $hours + 12;
        }
            
        $date = new DateTime($dateStr);
        $date->setTime($hours, $mins);
        return $date->format('Y-m-d H:i:s');
    }

	public function action_createevent() 
    {
		try {
            $private = (Input::get('private') == 'on') ? true : false;

			DB::table('events')->insert(
				array(
				'event_id' => null, 
				'user_id' => Auth::user()->user_id, 
				'event_name' => Input::get('name'), 
				'latitude' => Input::get('lat'), 
				'longitude' => Input::get('long'),
				'start_time' => $this->getDateTimeString(Input::get('daystart'), Input::get('hourstart'), Input::get('minutestart'), Input::get('daypartstart')),
				'end_time' => $this->getDateTimeString(Input::get('dayend'), Input::get('hourend'), Input::get('minuteend'), Input::get('daypartend')),
				'location' => Input::get('location'), 
				'list_description' => Input::get('listdescription'),
				'isprivate' => $private,
				'details' => Input::get('description')
				)
			);
		} 
        catch(Exception $e) {
            return View::make('newevent')->with('failed',"true");
		}
		return View::make('eventcreated');
	}

	public function action_deleteevent($id) {
		return View::make('eventcreated');
	}

    public function showDetail($id) 
    {
		$query = DB::table('events');
		$query = $query->join('users', 'events.user_id', '=', 'users.user_id');
		$query = $query->where('event_id', $id);
		$event = $query->first();
        return View::make('eventdetail')->with('event', $event);
    }
}
