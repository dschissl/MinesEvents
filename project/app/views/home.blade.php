@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
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
		<div class="input-group filters">
			<span class="input-group-addon">Group</span><input type="text" class="form-control" placeholder="ACMx, MAC, etc.">
		</div>
		<span class="input-group-addon">Start Date</span><div class="bfh-datepicker filters" id="startdate" data-date="today" data-min="today"></div>
		<span class="input-group-addon">End Date</span><div class="bfh-datepicker filters" id="enddate" data-date="today" data-min="today"></div>
		<button type="button" class="btn btn-success" id="filterbutton">Filter</button>
	</div>

	<div class="resultsPanel">
		<div class="list-group">
            <?php
				$markers = "";
                $events = DB::table('events')->get();
                foreach ($events as $event) {
                    $st = date_format(date_create($event->start_time), 'm/d/Y g:i A');
                    $et = date_format(date_create($event->end_time), 'm/d/Y g:i A');
                    
                    echo '<a href="#" class="list-group-item">';
                    echo '<h4 class="list-group-item-heading">'.$event->event_name.'</h4>';
                    echo '<p class="list-group-item-text">'.$st.' - '.$et.'</p>';
                    echo '<p class="list-group-item-text">'.$event->details.'</p>';
                    echo'</a>';

					$markers = $markers.'<marker name="'.$event->event_name.'" latitude="'.$event->latitude.'" longitude="'.$event->longitude.'" />';
					$markers = $markers.'<div>CONTENT</div>';
                }
            ?>
		</div>
	</div>

	<div id="map-canvas">
        <!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
	</div>
	<div id="markerHolder" style="display:none;">
		{{ $markers }}
	</div>
@endsection
