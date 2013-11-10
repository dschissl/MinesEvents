@extends('layouts.master')

{{ HTML::style('css/home.css') }}

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
@endsection