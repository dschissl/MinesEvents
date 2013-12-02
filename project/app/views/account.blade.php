@extends('layouts.master')

{{ HTML::style('css/account.css') }}

@section('title')
    My Account
@endsection

@section('content')
<div class="accountsection">	
    <form action="<?php echo asset('/index.php/deleteaccount'); ?>" method="get">
        <h2 style="margin-right:32px;">{{Auth::user()->name}}</h2>
        <h4>({{Auth::user()->email}})</h4>
        <button type="submit" class="btn btn-danger" id="deleteButton">Delete Account</button>
        <div class="hr"></div>
    </form>

	<form action="<?php echo asset('/index.php/changepassword'); ?>" method="get">

		<div class="input-group passForm">
			<span class="input-group-addon">Old Password</span>
			<input type="password" class="form-control" name="oldpass"/> 
		</div>

		@if($errors->has('password'))
            <span class="label label-danger"> {{$errors->first('password')}} </span>
		@endif

		<div class="input-group passForm">
			<span class="input-group-addon">New Password</span>
			<input type="password" class="form-control" name="password"/> 
		</div>

		@if($errors->has('password_confirmation'))
			<span class="label label-danger"> {{$errors->first('password_confirmation')}} </span>
		@endif
	
		<div class="input-group passForm">
			<span class="input-group-addon">Confirm New Password</span>
			<input type="password" class="form-control" name="password_confirmation"/> 
		</div>

        <button type="submit" class="btn btn-warning" id="changePasswordButton">Change Password</button>
	</form>

    <div class="hr"></div>
    <h3>Events</h3>
    <div class="tablediv">
    <table class="table table-hover" id="eventTable">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>My Event1</td>
                <td>This is the list description for my event</td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
@endsection
