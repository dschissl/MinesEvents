@extends('layouts.master')

{{ HTML::style('css/eventdetail.css') }}
{{ HTML::script('js/jquery-2.0.3.min.js'); }}
{{ HTML::script('js/googleMaps.js'); }}


@section('title')
    Event Detail
@endsection

@section('content')
	<?php 
		$private = ($event->isprivate) ? 'Yes' : 'No';

		$st = date_format(date_create($event->start_time), 'M j, Y g:i A');
        $et = date_format(date_create($event->end_time), 'M j, Y g:i A');

		$creator = $event->name;
	?>
	<div class='eventpanel'>
		<div class='info'>
			<h2>{{$event->event_name}}</h2>
            <?php
                if (Auth::check())
                {
                    $user_id = Auth::user()->user_id;
                    if ($event->user_id == $user_id) {
                        echo '
                            <form action="'.asset('/index.php/deleteevent/'.$event->event_id).'" method="get">
                                <button type="submit" class="btn btn-danger" id="deleteEvent">Delete Event</button>
                            </form>';
                    }
                }
            ?>	
			<div class="infobigtext">
				Where: <span class="infotext">{{$event->location}}</span><span class="tab" />
				Time: <span class="infotext">{{$st}} - {{$et}}</span><span class="tab" />
				Private: <span class="infotext">{{$private}}</span><span class="tab" />
				Creator: <span class="infotext">{{$creator}}</span>
			</div>
			<hr class="separate">
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
	<div id="markerHolder" style="display:none;">
		<?php 
			echo '<marker event_id="'.$event->event_id.'" name="'.$event->event_name.'" latitude="'.$event->latitude.'" longitude="'.$event->longitude.'"></marker>';
		?>
	</div>
	<script type="text/javascript">
		function initializeMinesMarker(me) {
			me.center();
		}
	</script>
@endsection
