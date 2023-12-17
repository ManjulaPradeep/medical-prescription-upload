@extends('\layout\master')

@section('title', 'Create Prescription')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Create Prescription</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('savePrescription') }}" method="post" enctype="multipart/form-data">
                            @csrf

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

                            <div class="form-group mb-3">
                                <label for="delivery_time">Delivery Time</label>
                                <select class="form-control form-select" name="delivery_time" id="delivery_time">
                                    <option value="slot1">2:00 PM - 4:00 PM</option>
                                    <option value="slot2">4:00 PM - 6:00 PM</option>
                                    <option value="slot3">6:00 PM - 8:00 PM</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="Address">Delivery Address</label>
                                <input type="text" class="form-control" name="Address" id="Address">
                            </div>

                            <div class="form-group mb-3">
                                <label for="note">Notes</label>
                                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                            </div>

                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-group mb-3">
                                    <label for="prescriptionImages">Image {{ $i }}</label>
                                    <input type="file" class="form-control-file" name="img{{ $i }}"
                                        id="prescriptionImages" multiple>
                                </div>
                            @endfor

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit Prescription</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
