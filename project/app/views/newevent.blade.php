@extends('layouts.master')

{{ HTML::style('css/newevent.css') }}
{{ HTML::script('js/jquery-2.0.3.min.js'); }}
{{ HTML::script('js/googleMaps.js'); }}

{{ HTML::style('css/datepicker.css'); }}
{{ HTML::script('js/bootstrap-datepicker.js'); }}
{{ HTML::script('js/makepickers.js'); }}

@section('title')
    Create Event
@endsection

@section('content')
<?php
	if (isset($failed) && $failed == "true"){
		echo '<div class="alert alert-danger"><strong>Failed!</strong> Event failed to create!</div>';
	}
?>

    <form action="<?php echo asset('/index.php/eventcreated'); ?>" method="get">
        <div class="inputpanel">
            <div class="input-group">	
                <span class="input-group-addon">Name</span>
                <input type="text" class="form-control" placeholder="Event Name" name="name" required="required" />	
            </div>
            <div class="input-group">	
                <span class="input-group-addon">Location</span>
                <input type="text" class="form-control" placeholder="Where it is" name="location" required="required" />	
            </div>
		    <div class="input-group">	
                <span class="input-group-addon">List Description</span>
                <input type="text" class="form-control" placeholder="A short and eye-catching description" name="listdescription" required="required" />	
            </div>
            <div class="input-group">	
                <span class="input-group-addon">
                    <input type="checkbox" name="private" />
                </span>
                <fieldset disabled>
                    <input type="text" class="form-control" placeholder="Private" />
                </fieldset>	
            </div>
            <!--<div class="input-group">	
                <span class="input-group-addon">Group</span>
                <select class="form-control" name="group">
                     <option>None</option>
                </select>
            </div>-->
            <div class="input-group">	
                <span class="input-group-addon">Start Date</span>	
                <div data-date-format="yyyy-mm-dd">	
                    <input class="form-control" type="text" id="daystart" name="daystart" value="<?php echo date("m/d/Y"); ?>" />
                </div>
            </div>
            <div class="input-group">	
                <span class="input-group-addon">End Date</span>	
                <div data-date-format="yyyy-mm-dd">	
                    <input class="form-control" type="text" id="dayend" name="dayend" value="<?php echo date("m/d/Y"); ?>" />
                </div>
            </div>
            <div class="input-group">	
                <span class="input-group-addon">Start Time</span>
                <input type="number" class="form-control" placeholder="Hour" name="hourstart" max="12" min="1" value="12" id="hourstart" />
                <input type="number" class="form-control fmt-zero" placeholder="Minute" name="minutestart" max="59" min="0" value="00" step="10" id="minutestart" />
                <select class="form-control" name="daypartstart">
                    <option selected="selected">AM</option>
                    <option>PM</option>
                </select>
            </div>
            <div class="input-group">	
                <span class="input-group-addon">End Time</span>
                <input type="number" class="form-control" placeholder="Hour" name="hourend" max="12" min="1" value="12" id="hourend" />
                <input type="number" class="form-control fmt-zero" placeholder="Minute" name="minuteend" max="59" min="0" value="00" step="10" id="minuteend" />
                <select class="form-control" name="daypartend">
                    <option selected="selected">AM</option>
                    <option>PM</option>
                </select>
            </div>
			<div>
				<input type="hidden" name="lat" id="lat" value="39.751244"/>
				<input type="hidden" name="long" id="long" value="-105.222260"/>
			</div>
			<button type="submit" class="btn btn-success" id="createbutton">Create</button>
		</div>
		<div class="mappanel">
			<h5>Location</h5>
			<div id="map-canvas">
				<!-- AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A is our API key, also used in the js call -->
			</div>
			<h5>Description</h5>
			<textarea rows="7" placeholder="Please enter a full detailed description of your event" name="description" required></textarea>
		</div>
		<div id="markerHolder" style="display:none;">
			<marker latitude="39.751244" longitude="-105.222260" event_id="-1" name="New Event"></marker>
		</div>
		<script type="text/javascript">
			function initializeMinesMarker(me) {
				google.maps.event.addListener(myMap, 'click', function(event) {
					me.marker.setMap(null);
					me.marker.setPosition(event.latLng);
					me.marker.setMap(myMap);
					$('#lat').val(event.latLng.lat());
					$('#long').val(event.latLng.lng());
				});
			}
		</script>
	</form>
@endsection
