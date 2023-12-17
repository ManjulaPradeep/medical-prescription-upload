@extends('\layout\master')

@section('title', 'Quotations')

@section('content')
    <div class="container mt-4">
        <h1>Your Quotations</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($quotations->isEmpty())
            <h4 class="text-danger">No quotations available.</h4>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Drug</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotations as $quotation)
                        <tr>
                            <td>{{ $quotation->drug }}</td>
                            <td>{{ $quotation->quantity }}</td>
                            <td>{{ $quotation->amount }}</td>
                            <td>{{ $quotation->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
