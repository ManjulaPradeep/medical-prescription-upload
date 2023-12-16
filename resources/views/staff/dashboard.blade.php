@extends('\layout\master')

@section('title', 'Staff Dashboad')

@section('content')
    <div class="container mt-5">
        <h1>Dashboard - Staff</h1>
        <a href="{{ route('prescriptions.indexForCustomer') }}" class="btn btn-primary mt-3">View Prescriptions</a>
        <a href="{{ route('quatation.create') }}" class="btn btn-primary mt-3">Create Quatation</a>

    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


@endsection
