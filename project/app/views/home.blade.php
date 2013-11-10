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
				<button class="btn btn-default" type="button">Go!</button>
			</span>
    </div>
	<div id="map-canvas"> <!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
	</div>
@endsection