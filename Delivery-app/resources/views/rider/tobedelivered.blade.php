<x-app-layout>
    <div class="content-container">
        <div class="table-container">
            <div class="card">
                <div class="card-body">
                    <h2 class="page-title text-white">{{ __("Orders to be Delivered") }}</h2>

                    @if($toBeDeliveredOrders->isEmpty())
                        <p class="text-white">{{ __('No orders to be delivered found.') }}</p>
                    @else
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th class="table-header">ID</th>
                                    <th class="table-header">Customer Name</th>
                                    <th class="table-header">Product Name</th>
                                    <th class="table-header">Description</th>
                                    <th class="table-header">Quantity</th>
                                    <th class="table-header">Total</th>
                                    <th class="table-header">Date</th>
                                    <th class="table-header">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($toBeDeliveredOrders as $order)
                                    <tr id="order-row-{{ $order->id }}">
                                        <td class="table-cell">{{ $order->id }}</td>
                                        <td class="table-cell">{{ $order->CusName }}</td>
                                        <td class="table-cell">{{ $order->name }}</td>
                                        <td class="table-cell">{{ $order->description }}</td>
                                        <td class="table-cell">{{ $order->quantity }}</td>
                                        <td class="table-cell">{{ $order->total }}</td>
                                        <td class="table-cell">{{ $order->Date }}</td>
                                        <td class="table-cell">
                                            <button 
                                                class="action-button"
                                                onclick="markAsDelivered({{ $order->id }}, {{ $order->origOrdersId }})"
                                                title="Mark as Delivered"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="action-icon" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414 0L9 12.586 7.707 11.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div id="notification-dialog" class="notification">
        <span id="notification-message"></span>
    </div>
</x-app-layout>

<style>
    .content-container {
        padding-top: 3rem;
        
    }

    .table-container {
        max-width: 1120px;
        margin-left: auto;
        margin-right: auto;
    }

    .card {
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
        border-radius: 0.375rem;
        overflow: hidden;
        background-color: #2d3748;
    }

    .card-body {
        padding: 1.5rem;
        color: #1f2937;
    }

    .page-title {
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-header {
        padding: 0.75rem;
        text-align: left;
        font-size: 0.75rem;
        font-weight: 500;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background-color: #10131a;
    }
    td {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 600;
        color: #fff; 
        background-color: #2d3748;
    }
    .table-body {
        background-color: white;
    }

    .table-cell {
        padding: 1rem;
        text-align: left;
    }

    .action-button {
        color: white;
        transition: color 0.5s;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: transparent;
        border: none;
    }

    .action-button:hover {
        color: #1e40af;
    }

    .action-icon {
        width: 2rem;
        height: 2rem;
    }

    .notification {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%) translateY(-20px);
        background-color: #3b82f6;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .notification.show {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(10px);
    }
</style>

<script>
    function markAsDelivered(orderId, origOrdersId) {
        fetch(`/orders/${orderId}/${origOrdersId}/deliver`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message);
                
                const row = document.getElementById(`order-row-${orderId}`);
                if (row) row.remove();
            } else {
                alert('Failed to mark as delivered');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function showNotification(message) {
        const notificationDialog = document.getElementById('notification-dialog');
        const notificationMessage = document.getElementById('notification-message');

        notificationMessage.textContent = message;
        notificationDialog.classList.add('show');

        setTimeout(() => {
            notificationDialog.classList.remove('show');
        }, 2000);
    }
</script>
