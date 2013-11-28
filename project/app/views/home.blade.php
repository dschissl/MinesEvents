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
			<input type="text" class="form-control" id="searchbar" name="search" value="<?php echo Input::get('search'); ?>" />
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Search</button>
            </span>
		</div>
		<div class="filterPanel">
			<div class="input-group filters">
				<span class="input-group-addon">Contains</span>
                <input type="text" class="form-control" placeholder="Tutoring, Pizza, etc." name="contains"  value="<?php echo Input::get('contains'); ?>" />
			</div>
			<div class="input-group filters">
				<span class="input-group-addon">Location</span>
                <input type="text" class="form-control" placeholder="BBW250" name="location" value="<?php echo Input::get('location'); ?>" />
			</div>
			<div class="input-group filters">
				<span class="input-group-addon">Group</span>
                <input type="text" class="form-control" placeholder="ACMx, MAC, etc." name="group" value="<?php echo Input::get('group'); ?>" /> 
			</div>
			<div class="input-group filters">	
				<span class="input-group-addon">Start Date</span>	
                <div data-date="12/02/2013" data-date-format="mm/dd/yyyy">	
                    <input class="form-control" type="text" id="daystart" name="daystart" value="<?php echo (Input::get('daystart') != '') ? Input::get('daystart') : date('m/d/Y'); ?>" />
                </div>
			</div>
			<div class="input-group filters">	
				<span class="input-group-addon">End Date</span>	
                <div data-date="12/02/2013" data-date-format="mm/dd/yyyy">	
                    <input class="form-control" type="text" id="dayend" name="dayend" value="<?php echo (Input::get('dayend') != '') ? Input::get('dayend') : date('m/d/Y'); ?>" />
                </div>
			</div>
			<button type="submit" class="btn btn-success" id="filterbutton">Filter</button>
		</div>
	</form>

	<div class="resultsPanel">
		<div class="list-group">
            <?php
				$markers = "";
				
				if (empty($events)){
					echo '<span class=\'label label-danger\'>No events could be found</span>';
				}
               
                foreach ($events as $event) {
                    $st = date_format(date_create($event->start_time), 'M j, Y g:i A');
                    $et = date_format(date_create($event->end_time), 'M j, Y g:i A');
                    
                    echo 
                        '<div class="list-group-item" event_id="'.$event->event_id.'" onclick="selectMarker('.$event->event_id.');">
                            <h4 class="list-group-item-heading">'.$event->event_name.'</h4>
                            <small class="list-group-item-text">'.$st.' - '.$et.'</small>
                            <p class="list-group-item-text">'.$event->list_description.'</p>
					       <a href="'.asset('/index.php/events/'.$event->event_id).'" class="eventLink">Show details</a>
                        </div>';

					$overflow = (strlen($event->details) > 200) ? '...' : '';
						
					$markers = $markers.
                        '<marker event_id="'.$event->event_id.'" name="'.$event->event_name.'" latitude="'.$event->latitude.'" longitude="'.$event->longitude.'"></marker>
                        <div>
                            <h4>'.$event->event_name.'</h4>
                            <p>'.substr($event->details,0,200).$overflow.'</p>
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
	<script type="text/javascript">
		function initializeMinesMarker(me) {
			google.maps.event.addListener(me.marker, 'click', function() {
				me.select();
			});
			google.maps.event.addListener(me.marker, 'mouseover', function() {
				me.hover(true);
			});
			google.maps.event.addListener(me.marker, 'mouseout', function() {
				me.hover(false);
			});
		}
	</script>
@endsection
