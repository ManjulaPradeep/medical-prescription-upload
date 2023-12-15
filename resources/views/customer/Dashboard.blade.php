@extends('\layout\master')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="container mt-5">
        <h1>Customer Dashboard</h1>
        {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPrescriptionModalLabel">Add Prescription</button> --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddPrescriptionModal">
            Add Prescription
        </button>
        <button class="btn btn-success ml-2">View Quotations</button>
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


    <!-- Modal -->
    <div class="modal fade" id="AddPrescriptionModal" tabindex="-1" aria-labelledby="AddPrescriptionModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddPrescriptionModal">Upload Prescription</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('savePrescription') }}" method="post">
                        @csrf


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

                        <div class="form-group mb-3">
                            <label for="prescriptionImages">Image 1</label>
                            <input type="file" class="form-control-file" name="img1" id="prescriptionImages" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <label for="prescriptionImages">Image 2</label>
                            <input type="file" class="form-control-file" name="img2" id="prescriptionImages" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <label for="prescriptionImages">Image 3</label>
                            <input type="file" class="form-control-file" name="img3" id="prescriptionImages" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <label for="prescriptionImages">Image 4</label>
                            <input type="file" class="form-control-file" name="img4" id="prescriptionImages" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <label for="prescriptionImages">Image 5</label>
                            <input type="file" class="form-control-file" name="img5" id="prescriptionImages" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Submit Prescription</button>
                        </div>

                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div> --}}
            </div>
        </div>
    </div>

@endsection
