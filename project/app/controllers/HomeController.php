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
			$query=$query->where('isprivate', false);
		}
		$events=$query->get();
		return View::make('home')->with('events',$events);
	}
	public function filterHome(){
		$query = DB::table('events');
		if (!Auth::check()) {
			$query=$query->where('isprivate', false);
		}
		$query=$query->where('details','like',"%".Input::get('contains')."%");
		$events=$query->get();
		return View::make('home')->with('events',$events);
	}

    public function showAbout()
    {
        return View::make('about');
    }
}
