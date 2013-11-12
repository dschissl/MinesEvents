@extends('layouts.master')

{{ HTML::style('css/newevent.css') }}
{{ HTML::script('js/jquery-2.0.3.min.js'); }}
{{ HTML::script('js/googleMaps.js'); }}

@section('title')
    Create Event
@endsection

@section('content')
	<form action="<?php echo asset('eventcreated'); ?>" method="get">
    <div class="inputpanel">
		<div class="input-group">	<span class="input-group-addon">Name</span><input type="text" class="form-control" placeholder="Event Name" name="name" required>	</div>
		<div class="input-group">	<span class="input-group-addon">Location</span><input type="text" class="form-control" placeholder="Where it is" name="location" required>	</div>
		<div class="input-group">	<span class="input-group-addon"><input type="checkbox" name="public"></span><fieldset disabled><input type="text" class="form-control" placeholder="Public"></fieldset>	</div>
		<div class="input-group">	<span class="input-group-addon">Group</span><select class="form-control" name="group">
			<option>None</option>
		</select></div>
		<div class="daygroup"><span class="daylabel">Start Date</span><div class="bfh-datepicker" data-date="today" data-min="today" name="daystart"></div>	</div>
		<div class="daygroup"><span class="daylabel">End Date</span><div class="bfh-datepicker" type="text" data-date="today" data-min="today" name="dayend"></div>	</div>
		<div class="daygroup"><span class="daylabel">Start Time</span><div class="bfh-timepicker" type="text"  name="timestart"></div>	</div>
		<div class="daygroup"><span class="daylabel">End Time</span><div class="bfh-timepicker" type="text" name="timeend"></div>	</div>
		<button type="submit" class="btn btn-success" id="filterbutton">Create</button>
	</div>
	<div class="mappanel">
		<h5>Location</h5>
		<div id="map-canvas">
			<!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
		</div>
		<h5>Description</h5>
		<textarea rows="7" placeholder="Please enter a full detailed description of your event" name="description" required></textarea>
	</div>
	
	</form>
@endsection
