@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<?php
        function getDateTimeString($dateStr, $hours, $mins, $dayPartStr) {
            if ($dayPartStr == 'PM') {
                $hours = $hours + 12;
            }
                
            $date = new DateTime($dateStr);
            $date->setTime($hours, $mins);
            return $date->format('Y-m-d H:i:s');
        }

		DB::table('events')->insert(
			array(
			'event_id' => null, 
			'user_id' => 0, 
			'event_name' => Input::get('name'), 
			'latitude' => Input::get('lat'), 
			'longitude' => Input::get('long'),
			'start_time' => getDateTimeString(Input::get('daystart'), Input::get('hourstart'), Input::get('minutestart'), Input::get('daypartstart')),
			'end_time' => getDateTimeString(Input::get('dayend'), Input::get('hourend'), Input::get('minuteend'), Input::get('daypartend')),
			'location' => Input::get('location'), 
			'Details' => Input::get('description')
			)
		);
		
		echo '<div class="alert alert-success"><strong>Success!</strong> You have created a new event!</div>';
	?>
@endsection
