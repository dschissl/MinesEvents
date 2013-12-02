@extends('layouts.master')


@section('title')
    Register
@endsection

@section('content')
{{ HTML::style('css/newaccount.css') }}

<?php
	if (isset($failed) && $failed == "true"){
		echo '<div class="alert alert-danger"><strong>Failed!</strong> An account was found with that email!</div>';
	}
?>

<div class="inputpanel">
	<div class="jumbotron">
  		<h1>Registering is Free and Simple!</h1>
  		<p>Users can create new events, manage event groups, view private events, and more!</p>
	</div>
	 <form action="<?php echo asset('/index.php/accountcreated'); ?>" method="post">
			@if($errors->has('name'))
				<span class="label label-danger"> {{$errors->first('name')}} </span>
			@endif
			<div class="input-group">	
				<input type="text" class="form-control" placeholder="Name" name="name" required="required" value="<?php echo Input::old('name'); ?>" />
			</div>
			@if($errors->has('email'))
				<span class="label label-danger"> {{ $errors->first('email')}} </span>
			@endif
			<div class="input-group">	
				<input type="text" class="form-control" placeholder="Email" name="email" required="required" value="<?php echo Input::old('email'); ?>"/>
			</div>
			@if($errors->has('password'))
				<span class="label label-danger"> {{$errors->first('password')}} </span>
			@endif
			<div class="input-group">	
				<input type="password" class="form-control" placeholder="Password" name="password" required="required"/>	
			</div>
			@if($errors->has('password_confirmation'))
				<span class="label label-danger"> {{$errors->first('password_confirmation')}} </span>
			@endif
			<div class="input-group">	
				<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="required"/>	
			</div>
			<button type="submit" class="btn btn-success" id="createbutton">Register</button>
	</form>
<div>
@endsection
