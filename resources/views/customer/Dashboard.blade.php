@extends('\layout\master')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mt-5">
        <h1>Dashboard - Customer</h1>
        {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPrescriptionModalLabel">Add Prescription</button> --}}
        <a href="{{ route('prescriptions.create') }}" class="btn btn-primary mt-3">Upload Prescription</a>
        <a href="{{ route('prescriptions.indexForCustomer') }}" class="btn btn-primary mt-3">View Prescriptions</a>
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
