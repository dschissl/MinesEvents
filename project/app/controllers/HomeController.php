<?php

class HomeController extends BaseController {

    public function action_index()
    {
        //$this->layout->title = 'Home Page';
        //$this->layout->content = 'content';
    }
    
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
	public function showHome()
	{
		$query = DB::table('events');
		if (!Auth::check()) {
			$query = $query->where('isprivate', false);
		}
		$events = $query->get();
		return View::make('home')->with('events', $events);
	}
    
	public function filterHome(){
		$query = DB::table('events');
		$query = $query->leftJoin('users', 'events.user_id', '=', 'users.user_id');
		if (!Auth::check()) {
			$query = $query->where('isprivate', false);
		}
        if (Input::get('search') != '') {
            $query = $query->where('event_name', 'like', '%'.Input::get('search').'%')
                ->orWhere('location', 'like', '%'.Input::get('search').'%')
                ->orWhere('list_description', 'like', '%'.Input::get('search').'%')
                ->orWhere('details', 'like', '%'.Input::get('search').'%');
        }
        if (Input::get('contains') != '') {
            $query = $query->where('details', 'like', '%'.Input::get('contains').'%');
        }
        if (Input::get('location') != '') {
            $query = $query->where('location', 'like', '%'.Input::get('location').'%');
        }
        if (Input::get('group') != '') {
            $query = $query->where('name', 'like', '%'.Input::get('group').'%');
        }
        if (Input::get('daystart') != '') {
            $start_date = new DateTime(Input::get('daystart'));
            $query = $query->where('start_time', '>=', $start_date);
        }
        if (Input::get('dayend') != '') {
            $end_date = new DateTime(Input::get('dayend'));
            $end_date->setTime(23, 59);
            $query = $query->where('end_time', '<=', $end_date);
        }
		$events = $query->get();
		return View::make('home')->with('events', $events);
	}

    public function showAbout()
    {
        return View::make('about');
    }
}
