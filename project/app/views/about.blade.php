@extends('layouts.master')

{{ HTML::style('css/about.css') }}

@section('title')
    About
@endsection

@section('content')
	<div class="aboutbox">
		<h1 class="abouttext">About Us</h1>
		<p class="abouttext">This website was created by three computer science students at the Colorado School of Mines. It allows students to view and create campus event details. The usage of Google Maps API allows students to view events by location on a campus map as well.</p>
	</div>
@endsection