@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<?php
		DB::table('events')->insert(
			array(
			'event_id' => null, 
			'user_id' => 0, 
			'event_name' => Input::get('name'), 
			'latitude' => 39.7516, 
			'longitude' => -105.222, 
			'start_time' => Input::get('daystart').' '.'00:00:00',
			'end_time' => Input::get('dayend').' '.'00:00:00',
			'location' => Input::get('location'), 
			'Details' => Input::get('description')
			)
		);
		
		echo '<div class="alert alert-success"><strong>Success!</strong> You have created a new event!</div>';
	?>
@endsection
