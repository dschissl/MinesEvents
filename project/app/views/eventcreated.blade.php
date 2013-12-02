@extends('layouts.master')

	{{ HTML::style('css/home.css') }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/googleMaps.js'); }}

@section('title')
    Home
@endsection

@section('content')
	<?php
		if ($created == "true"){
			echo '<div class="alert alert-success"><strong>Success!</strong> Your event has been created!</div>';
		}else{
			echo '<div class="alert alert-danger"><strong>Success!</strong> Your event has been deleted</div>';
		}
	?>
@endsection
