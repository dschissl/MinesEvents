@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<?php
		echo '<h1>'.Input::get('daystart').'</h1>';
		DB::table('events')->insert(
			array(
			'event_id' => null, 
			'user_id' => 0, 
			'event_name' => Input::get('name'), 
			'latitude' => 39.7516, 
			'longitude' => -105.222, 
			'start_time' => Input::get('daystart').' '.Input::get('timestart'), 
			'end_time' => Input::get('dayend').' '.Input::get('timeend'), 
			'location' => Input::get('location'), 
			'Details' => Input::get('description')
			)
		);
		
		echo '<div class="alert alert-success"><strong>Success!</strong> You have created a new event!</div>';
	?>
@endsection
