@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('script/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<?php
		DB::table('events')->insert(
			array(
			'event_id' => null, 
			'user_id' => 0, 
			'event_name' => 'Created Event', 
			'latitude' => 39.7516, 
			'longitude' => -105.222, 
			'start_time' => '2013-11-15 9:30:00', 
			'end_time' => '2013-11-15 9:50:00', 
			'location' => 'Africa', 
			'Details' => 'This is going to be a really sweet event'
			)
		);
	?>
@endsection
