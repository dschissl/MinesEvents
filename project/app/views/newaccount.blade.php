@extends('layouts.master')


@section('title')
    Register
@endsection

@section('content')
{{ HTML::style('css/newaccount.css') }}

<?php
		if ($failed == "true"){
			echo '<div class="alert alert-danger"><strong>Failed!</strong> An account was found with that email!</div>';
		}
	?>

<div class="inputpanel">
	<div class="jumbotron">
  		<h1>Registering is Free and Simple!</h1>
  		<p>Users can create new events, manage event groups, view private events, and more!</p>
	</div>
	 <form action="<?php echo asset('/index.php/accountcreated'); ?>" method="post">
			<div class="input-group">	
				<input type="text" class="form-control" placeholder="Full Name" name="name" required="required" />	
			</div>
			@if($errors->has('name'))
				{{$errors->first('name')}}
			@endif
			<div class="input-group">	
				<input type="text" class="form-control" placeholder="Email" name="email" required="required" />	
			</div>
			@if($errors->has('email'))
				{{$errors->first('email')}}
			@endif
			<div class="input-group">	
				<input type="password" class="form-control" placeholder="Password" name="password" required="required" />	
			</div>
			@if($errors->has('password'))
				{{$errors->first('password')}}
			@endif
			<div class="input-group">	
				<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="required" />	
			</div>
			@if($errors->has('password_confirmation'))
				{{$errors->first('password_confirmation')}}
			@endif
			<button type="submit" class="btn btn-success" id="createbutton">Register</button>
	</form>
<div>
@endsection
