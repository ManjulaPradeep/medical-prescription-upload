@extends('\layout\master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

    <div class="box">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="userSelect" id="userSelect">
                User Type
                <select name="user_type" required="required">
                    <option value="customer">Customer</option>
                    <option value="staff">Pharmacy Staff</option>
                </select>
            </div>

            <div class="inputBox">
                <input type="text" name="name" required="required">
                <label for="">Username</label>
            </div>

            <div class="inputBox">
                <input type="text" name="contact" required="required">
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
                <input type="password" name="password_confirmation" required="required">
                <label for="">Re type Password</label>
            </div>

            <input type="submit" name="" value="Submit">
        </form>

        <div class="inputBox">
            <a href="{{ URL::route('loginPage') }}" class="form-link">Go to Login Page </a>
        </div>

    </div>
@endsection
