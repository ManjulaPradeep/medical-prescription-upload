@extends('\layout\master')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mt-5">
        <h1>Dashboard - Customer</h1>
        <a href="{{ route('prescriptions.create') }}" class="btn btn-primary mt-3">Upload Prescription</a>
        <a href="{{ route('prescriptions.indexForCustomer') }}" class="btn btn-primary mt-3">View Prescriptions</a>
        <a href="{{ route('quatation.index') }}" class="btn btn-primary mt-3">View Quotations</a>

    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection
