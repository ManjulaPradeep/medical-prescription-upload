@extends('\layout\master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">

    <div class="box">
		<h2>Register</h2>
		<form action="" method="POST">
            @csrf
			<div class="inputBox">
				<input type="text" name="uname" required="required">
				<label for="">Username</label>
			</div>

            <div class="inputBox">
				<input type="text" name="tp" required="required">
				<label for="">Telephone</label>
			</div>

            <div class="inputBox">
				<input type="text" name="address" required="required">
				<label for="">Address</label>
			</div>

            <div class="inputBox">
				<input type="email" name="email" required="required">
				<label for="">E- mail</label>
			</div>

            <div class="inputBox">
				<input type="date" name="dob" required="required">
				<label for="">DOB</label>
			</div>

			<div class="inputBox">
				<input type="password" name="password" required="required">
				<label for="">Password</label>
			</div>

            <div class="inputBox">
				<input type="password" name="repassword" required="required">
				<label for="">Re type Password</label>
			</div> 

			<input type="submit" name="" value="Submit">
		</form>

        <div class="inputBox">
            <a href="{{ URL::route('loginPage') }}" class="form-link">Go to Login Page </a>
        </div>

	</div>
@endsection
