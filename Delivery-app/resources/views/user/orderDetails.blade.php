<x-app-layout>
    <style>
        .container {
            padding-top: 3rem;
        }

        .wrapper {
            max-width: 112rem;
            margin: 0 auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .card {
            background-color: #2d3748;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-radius: 0.375rem;
        }

        .card-body {
            padding: 1.5rem;
            color: #2d3748;
        }

        .table-container {
            overflow-x: auto;
            display: flex;
            justify-content: center;
        }

        .table {
            min-width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
            text-align: center;
        }

        .table th {
            padding: 0.5rem 1rem;
            text-transform: uppercase;
            font-weight: 500;
            color: #fff;
            background-color: #4A5568; /* Darker background for headers */
        }

        .table tr {
            padding: 0.5rem 1rem;
            text-transform: uppercase;
            font-weight: 500;
            color: #2d3748;
            background-color: #f7fafc; /* Light background for rows */
            
        }

        .table tbody tr:hover {
            background-color: #edf2f7;
        }

        .table td {
            padding: 0.5rem 1rem;
            background-color: #2d3748;
            color: #fff;
        }

        .table td, .table th {
            border-bottom: 1px solid #e2e8f0; /* Border for rows */
        }

        .empty-state {
            text-align: center;
            color: #a0aec0;
        }
    </style>

    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-body">
                    @if($orders && count($orders) > 0)
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->description }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>${{ number_format($order->total, 2) }}</td>
                                            <td>{{ $order->Date }}</td>
                                            <td>{{ $order->status }}</td>
                                            {{-- @if ($order->status === 'delivered')
                                                <td>
                                                    <button onclick="window.location.href='{{ route('user.feedback', ['id' => $order->id]) }}'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" class="inline-block mr-2">
                                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2h-6l-4 4-4-4H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm1 3v2h10V7H5zm0 4v2h8v-2H5zm0 4v2h6v-2H5z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            @endif --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            {{ __("No orders made yet!") }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
