@extends('\layout\master')

@section('title', 'Login')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">

<div class="box">
	<h2>Login</h2>
	<form action="" method="POST">
		@csrf

		<div class="userSelect" id="userSelect">
			User Type			
			<select name="user_type" required="required">
				<option value="customer">Customer</option>
				<option value="staff">Pharmacy Staff</option>
			</select>
		</div>

		<div class="inputBox">
			<input type="text" name="" required="required">
			<label for="">Username</label>
		</div>
		<div class="inputBox">
			<input type="password" name="" required="required">
			<label for="">Password</label>
		</div>
		<input type="submit" name="" value="Submit">
	</form>

	<div class="inputBox">
		<a href="{{ URL::route('register') }}" class="form-link">New user? Please Register </a>
	</div>

</div>
@endsection