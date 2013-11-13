@extends('layouts.master')

{{ HTML::style('css/newaccount.css') }}

@section('title')
    Register
@endsection

@section('content')
	 <form action="<?php echo asset('/index.php/accountcreated'); ?>" method="post">
		<div class="inputpanel">
				<div class="input-group">	
					<input type="text" class="form-control" placeholder="Full Name" name="name" required="required" />	
				</div>
				<div class="input-group">	
					<input type="text" class="form-control" placeholder="Email" name="email" required="required" />	
				</div>
				<div class="input-group">	
					<input type="password" class="form-control" placeholder="Password" name="password" required="required" />	
				</div>
				<div class="input-group">	
					<input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required="required" />	
				</div>
				<button type="submit" class="btn btn-success" id="createbutton">Create</button>
		<div>
	</form>
@endsection