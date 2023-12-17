@extends('\layout\master')

@section('title', 'All Prescriptions')

@section('content')
    <div class="container mt-4">
        <h1>All Prescriptions</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($prescriptions->count() > 0)
            <div class="row">
                @foreach ($prescriptions as $prescription)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                Prescription {{ $prescription->id }}
                            </div>
                            <div class="card-body">
                                <p>Delivery Time: {{ $prescription->delivery_time }}</p>
                                <p>Delivery Address: {{ $prescription->address }}</p>
                                <p>Notes: {{ $prescription->note }}</p>
                                {{-- Display images --}}
                                <div class="row">
                                    @foreach (range(1, 5) as $index)
                                        @if ($prescription->{"img$index"})
                                            <div class="col-md-4 mb-2">
                                                <img src="{{ asset($prescription->{"img$index"}) }}" class="img-fluid"
                                                    alt="Image {{ $index }}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h4 class="text-danger">No prescriptions available.</h4>
        @endif
    </div>
@endsection
