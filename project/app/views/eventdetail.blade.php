@extends('layouts.master')

{{ HTML::style('css/eventdetail.css') }}
{{ HTML::script('js/jquery-2.0.3.min.js'); }}
{{ HTML::script('js/googleMaps.js'); }}


@section('title')
    Event Detail
@endsection

@section('content')
	<?php 
		$event = DB::table('events')->where('event_id',$id)->first();
		if ($event->isprivate) {
			$private = 'Yes';
		}else{
			$private = 'No';
		}
	?>
	<div class='eventpanel'>
		<div class='info'>
			<h1>{{$event->event_name}}</h1>
			<span class="infobigtext">
				Where: <span class="infotext">{{$event->location}}</span><span class="tab" />
				Time: <span class="infotext">{{$event->start_time}} - {{$event->end_time}}</span><span class="tab" />
				Private: <span class="infotext">{{$private}}</span>
			</span><hr class="separate">
		</div>
		<span class="longtext">
			{{$event->details}}
		</span>
	</div>
	
	<div class="mappanel">
		<div id="map-canvas">
			<!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
		</div>
	</div>
@endsection