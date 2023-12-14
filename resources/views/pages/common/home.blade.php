@extends('\layout\master')

@section('content')
    <div class="row text-center">
        <h1 class="text-primary">Online Medicine Odering</h1>
    </div>

    <div class="row text-center">
        <p class="text-primary">Upload your medical prescription</p>
        <p class="text-primary">Get your medicines to your feet</p>
    </div>

    <div class="row text-center">
        <div class="col-2">
            {{-- <button class="btn btn-primary w-100">Login</button> --}}
            <a href="{{ URL::route('loginPage') }}" class="btn btn-primary w-100"> Login </a>
        </div>
        <div class="col-2">
            <a href="{{ URL::route('registerPage') }}" class="btn btn-primary w-100"> Register </a>
        </div>
    </div>

@endsection
