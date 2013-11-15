@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/googleMaps.js'); }}
	
	{{ HTML::style('css/datepicker.css'); }}
	{{ HTML::script('js/bootstrap-datepicker.js'); }}
	{{ HTML::script('js/makepickers.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<form method="post" action="<?php echo asset('/index.php/filter'); ?>">
		<div class="input-group" id="searchgroup">
			<input type="text" class="form-control" id="searchbar" name="search">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Search</button>
				</span>
		</div>
		<div class="filterPanel">
			<div class="input-group filters">
				<span class="input-group-addon">Contains</span><input type="text" class="form-control" placeholder="Tutoring, Pizza, etc." name="contains"/>
			</div>
			<div class="input-group filters">
				<span class="input-group-addon">Location</span><input type="text" class="form-control" placeholder="BBW250" name="location" />
			</div>
			<div class="input-group filters">
				<span class="input-group-addon">Group</span><input type="text" class="form-control" placeholder="ACMx, MAC, etc." name="group"/> 
			</div>
			<div class="input-group filters">	
				<span class="input-group-addon">Start Date</span>	<div data-date="12-02-2012" data-date-format="dd-mm-yyyy">	<input class="form-control" type="text" id="daystartfilter" name="daystart"/></div>
			</div>
			<div class="input-group filters">	
				<span class="input-group-addon">End Date</span>	<div data-date="12-02-2012" data-date-format="dd-mm-yyyy">	<input class="form-control" type="text" id="dayendfilter" name="dayend"/></div>
			</div>
			<button type="submit" class="btn btn-success" id="filterbutton">Filter</button>
		</div>
	</form>

	<div class="resultsPanel">
		<div class="list-group">
            <?php
				$markers = "";
               
                foreach ($events as $event) {
                    $st = date_format(date_create($event->start_time), 'm/d/Y g:i A');
                    $et = date_format(date_create($event->end_time), 'm/d/Y g:i A');
                    
                    echo 
                        '<div class="list-group-item" event_id="'.$event->event_id.'" onclick="selectMarker('.$event->event_id.');">
                            <h4 class="list-group-item-heading">'.$event->event_name.'</h4>
                            <small class="list-group-item-text">'.$st.' - '.$et.'</small>
                            <p class="list-group-item-text">'.$event->details.'</p>
					       <a href="'.asset('/index.php/events/'.$event->event_id).'" class="eventLink">Show details</a>
                        </div>';

					$markers = $markers.
                        '<marker event_id="'.$event->event_id.'" name="'.$event->event_name.'" latitude="'.$event->latitude.'" longitude="'.$event->longitude.'"></marker>
                        <div>
                            <h4>'.$event->event_name.'</h4>
                            <p>'.$event->details.'</p>
                            <a href="'.asset('/index.php/events/'.$event->event_id).'" class="eventLink">Show details</a>
                        </div>';
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
