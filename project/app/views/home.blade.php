@extends('layouts.master')

{{ HTML::style('css/home.css') }}
{{ HTML::script('script/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<div class="input-group" id="searchgroup">
		<input type="text" class="form-control" id="searchbar">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Search</button>
			</span>
    </div>
	<div class="filterPanel">
		<div class="input-group filters">
			<span class="input-group-addon">Contains</span><input type="text" class="form-control" placeholder="Tutoring, Pizza, etc.">
		</div>
		<div class="input-group filters">
			<span class="input-group-addon">Location</span><input type="text" class="form-control" placeholder="BBW250">
		</div>
		<span class="input-group-addon">Start Date</span><div class="bfh-datepicker filters" id="startdate" data-date="today" data-min="today"></div>
		<span class="input-group-addon">End Date</span><div class="bfh-datepicker filters" id="enddate" data-date="today" data-min="today"></div>
	</div>
	<div id="map-canvas"> <!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
	</div>
@endsection