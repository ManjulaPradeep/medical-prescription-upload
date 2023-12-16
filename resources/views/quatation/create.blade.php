@extends('\layout\master')

@section('title', 'Create Quatation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 bg-primary">images</div>
            <div class="col-6 bg-danger">right</div>
        </div>
    </div>














    <div class="container mt-4">
        <h1>Create Quotation</h1>

        <div class="mb-4">

            <form id="drugEntryForm">
                @csrf

                <div class="form-group">
                    <label for="drug">Drug</label>
                    <input type="text" class="form-control" name="drug" id="drug" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                    <small class="text-danger" id="quantityError"></small>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" class="form-control" name="amount" id="amount" required>
                    <small class="text-danger" id="amountError"></small>
                </div>

                <button type="button" class="btn btn-success" id="addDrug">Add</button>
            </form>
        </div>


        <div>
            <h4>Quotation Details</h4>

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

            <div class="mb-3">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" readonly>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var drugEntries = [];
            var total = 0;

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
