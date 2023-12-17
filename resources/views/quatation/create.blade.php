@extends('\layout\master')

@section('title', 'Create Quatation')

@section('content')

    <div class="container">
        <h1>Create Quotation</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row p-3">
            {{-- --------------- Left side div (images) ------------------ --}}
            <div class="col-4 border border-primary border-end-0 p-3">
                <div class="row border border-primary pt-3 ps-1 pe-1">
                    <img src="..." alt="..." class="img-thumbnail">
                    <label for="">Image 1</label>
                </div>
                <div class="row border border-primary  ps-1 pe-1">
                    <div class="col-3  border border-primary">
                        <img src="..." alt="..." class="img-thumbnail">
                        <label for="">Image 2</label>
                    </div>
                    <div class="col-3  border border-primary">
                        <img src="..." alt="..." class="img-thumbnail">
                        <label for="">Image 3</label>
                    </div>
                    <div class="col-3  border border-primary">
                        <img src="..." alt="..." class="img-thumbnail">
                        <label for="">Image 4</label>
                    </div>
                    <div class="col-3  border border-primary">
                        <img src="..." alt="..." class="img-thumbnail">
                        <label for="">Image 5</label>
                    </div>
                </div>
            </div>

            {{-- --------------- Right side div (table) ------------------ --}}
            <div class="col-8 border border-primary border-start-0 p-3">
                <div class="row border border-primary pt-3 ">

                    <form id="drugEntryForm">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="drug">Drug</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="drug" id="drug" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="quantity">Quantity</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                                    <small class="text-danger" id="quantityError"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="amount">Amount</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="number" step="0.01" class="form-control" name="amount" id="amount"
                                        required>
                                    <small class="text-danger" id="amountError"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end mb-3">
                            {{-- <div class="col-3">
                                <button class="btn btn-primary w-100" id="sendQuotation">Send Quotation</button>
                            </div> --}}
                            <div class="col-3">
                                <button type="button" class="btn btn-success w-100" id="addDrug">Add</button>
                            </div>
                        </div>
                    </form>
                </div>


                {{-- ------------------- Table ---------------------- --}}
                <div class="row border border-primary p-3">
                    <table class="table" id="quotationTable">
                        <thead>
                            <tr>
                                <th>Drug</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="row justify-content-end mb-3">

                        <div class="col-3">
                            <button class="btn btn-primary w-100" id="sendQuotation">Send Quotation</button>
                        </div>

                        <div class="col-3">
                            <label for="total">Total</label>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="total" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var drugEntries = [];
            var total = 0;

            $('#total').val(0);

            $('#addDrug').click(function() {
                var drug = $('#drug').val();
                var quantity = $('#quantity').val();
                var amount = $('#amount').val();

                // Validate Quantity and Amount inputs
                if (!isValidNumber(quantity)) {
                    $('#quantityError').text('Please enter a valid number.');
                    return;
                } else {
                    $('#quantityError').text('');
                }

                if (!isValidNumber(amount)) {
                    $('#amountError').text('Please enter a valid number.');
                    return;
                } else {
                    $('#amountError').text('');
                }

                drugEntries.push({
                    drug: drug,
                    quantity: quantity,
                    amount: amount
                });

                updateTable();

                $('#drug').val('');
                $('#quantity').val('');
                $('#amount').val('');

                calculateTotal();
            });


            $('#sendQuotation').click(function() {
                saveQuotationData();
            });

            function saveQuotationData() {
                $.ajax({
                    url: '{{ route('quatation.store') }}', // Adjust the route name
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tableData: drugEntries,
                        total: total.toFixed(2),
                    },
                    success: function(response) {
                        console.log(response.message);
                        // Optionally, you can redirect the user or perform other actions after success
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle the error case if needed
                    }
                });
            }



            function isValidNumber(value) {
                // Check if the value is a valid number (integer, float, or double)
                return /^[+-]?\d+(\.\d+)?$/.test(value);
            }

            function updateTable() {
                var tbody = $('#quotationTable tbody');
                tbody.empty();

                drugEntries.forEach(function(entry) {
                    var total = parseFloat(entry.quantity) * parseFloat(entry.amount);

                    var row = '<tr>' +
                        '<td>' + entry.drug + '</td>' +
                        '<td>' + entry.quantity + '</td>' +
                        '<td>' + entry.amount + '</td>' +
                        '<td>' + total.toFixed(2) + '</td>' +
                        '</tr>';
                    tbody.append(row);
                });
            }

            function calculateTotal() {
                total = drugEntries.reduce(function(acc, entry) {
                    return acc + parseFloat(entry.quantity) * parseFloat(entry.amount);
                }, 0);

                $('#total').val(total.toFixed(2));
            }
        });
    </script>



@endsection
