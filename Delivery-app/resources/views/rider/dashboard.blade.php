<x-app-layout>
    <style>
        body {
            background-color: white;
            color: #2d3748;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 3rem 1.5rem;
        }

        .card {
            background-color: #2d3748;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        h2 {
            color: #fff;
            font-weight: 600;
            font-size: 1.125rem;
            line-height: 1.75rem;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            background-color: #2d3748; /* Table background color */
            color: white; /* Text color */
            margin-bottom: 1.5rem;
        }

        thead {
            background-color: #13171f; /* Table header background color */
        }

        th, td {
            padding: 0.75rem;
            /* Removed border styling from here */
        }

        th {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            color: #fff; /* Header text color */
        }

        td {
            font-size: 0.875rem;
        }
        tbody tr:hover {
            background-color: #434c5e; /* Row hover color */
        }

        .text-left {
            text-align: left;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .bg-blue-700 {
            background-color: #2b6cb0;
        }

        .hover\:bg-blue-700:hover {
            background-color: #2b6cb0;
        }

        .transition-colors {
            transition: background-color 0.3s;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .button {
            background-color: white;
            color: black;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s;
            width: 5rem;
        }

        .button:hover {
            background-color: #2b6cb0; /* Blue color */
        }

        .text-center {
            text-align: center;
        }
    </style>

    <div class="container">
        <div class="card">
            <h2>{{ __("Pending Orders") }}</h2>

            @if($pendingOrders->isEmpty())
                <p>{{ __('No pending orders found.') }}</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th style="width: 20%;">Description</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customerName }}</td>
                                <td>{{ $order->name }}</td>
                                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $order->description }}
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment }}</td>
                                <td>{{ $order->Date }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="button">Get</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
