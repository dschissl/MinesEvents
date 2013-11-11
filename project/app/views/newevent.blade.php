@extends('layouts.master')

{{ HTML::style('css/newevent.css') }}
{{ HTML::script('script/googleMaps.js'); }}

@section('title')
    Create Event
@endsection

@section('content')
    <div class="inputpanel">
		<div class="input-group">	<span class="input-group-addon">Name</span><input type="text" class="form-control" placeholder="Event Name">	</div>
		<div class="input-group">	<span class="input-group-addon">Location</span><input type="text" class="form-control" placeholder="Where it is">	</div>
		<div class="input-group">	<span class="input-group-addon"><input type="checkbox"></span><fieldset disabled><input type="text" class="form-control" placeholder="Public"></fieldset>	</div>
		<div class="input-group">	<span class="input-group-addon">Group</span><select class="form-control">
			<option>Group 1</option>
			<option>Group 2</option>
			<option>Group 3</option>
			<option>Group 4</option>
			<option>Group 5</option>
		</select></div>
		<div class="daygroup"><span class="daylabel">Start Date</span><div class="bfh-datepicker" id="startdate" data-date="today" data-min="today"></div>	</div>
		<div class="daygroup"><span class="daylabel">End Date</span><div class="bfh-datepicker" id="enddate" data-date="today" data-min="today"></div>	</div>
		<div class="daygroup"><span class="daylabel">Start Time</span><div class="bfh-timepicker" id="starttime"></div>	</div>
		<div class="daygroup"><span class="daylabel">End Time</span><div class="bfh-timepicker" id="endtime"></div>	</div>
		<button type="button" class="btn btn-success" id="filterbutton">Create</button>
	</div>
	<div class="mappanel">
		<h5>Location</h5>
		<div id="map-canvas">
			<!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
		</div>
		<h5>Description</h5>
		<textarea class="form-control" rows="7"></textarea>
	</div>
@endsection