<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .code-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }
        /* Modal Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        /* Modal Content */
        .modal-content {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Modal Title */
        .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 20px;
        }

        /* Payment Options Container */
        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 5px; /* Space between options */
        }

        /* Payment Option */
        .payment-option {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Payment Images */
        .payment-option img {
            width: 64px;
            height: 64px;
        }

        /* Payment Buttons */
        .payment-button {
            padding: 10px 20px;
            width: 100px;
            background-color: #3478ff; /* Gray background */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .payment-button:hover {
            background-color: #4b5563; /* Darker gray on hover */
        }
        .cart-item {
            border: 1px solid rgb(0, 0, 0); /* Outline */
            border-radius: 0.5rem; /* Rounded corners */
            padding: 1rem; /* Spacing inside the box */
            transition: box-shadow 0.3s, transform 0.3s; /* Smooth transition */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1), 0px 1px 3px rgba(0, 0, 0, 0.06); /* Initial shadow */
            background-color: #ffffff; /* White background for contrast */
        }

        .cart-item:hover {
            transform: translateY(-10px); /* Slight upward movement */
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2), 0px 4px 6px rgba(0, 0, 0, 0.1); /* Larger shadow on hover */
        }


        .cart-header {
            font-weight: bold;
            font-size: 1.25rem; /* Tailwind's text-xl */
        }

        .cart-button {
            padding: 0.5rem 1rem; /* Tailwind's px-4 py-2 */
            border-radius: 0.375rem; /* Tailwind's rounded */
            color: black /* Black text */
        }

        .clear-cart {
            background-color: aqua; /* Tailwind's red-500 */
            margin-top: 0.5rem; /* Tailwind's mt-2 */
        }

        .place-order {
            background-color: aqua; /* Tailwind's green-500 */
            margin-left: 0.5rem; /* Tailwind's ml-2 */
        }

        /* Custom grid styles */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 equal columns */
            gap: 1rem; /* Space between grid items */
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr); /* 2 columns on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .grid {
                grid-template-columns: 1fr; /* 1 column on extra small screens */
            }
        }
        #confirmation-modal {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 50; /* Ensure it's on top */
            align-items: center;
            justify-content: center;
        }

        /* Modal content */
        #confirmation-modal .modal-content {
            background-color:aqua;
            padding: 1.5rem;
            border-radius: 0.5rem;
            max-width: 400px;
            width: 90%;
            text-align: center;
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
            opacity: 0; /* Starts as invisible */
            visibility: hidden; /* Ensure it's not interactable when hidden */
            z-index: 1000;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .notification.show {
            opacity: 1; /* Make it visible */
            visibility: visible;
            transform: translateX(-50%) translateY(10px); /* Small movement */
        }
    
    </style>
</head>

    <x-app-layout>
        {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Welcome ') }} {{ Auth::user()->name }}
            </h2>
        </x-slot> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="background-color: #2d3748;">
                    @if(count($cart) > 0)
                        <div class="grid"> <!-- Using the custom grid class -->
                            @php
                                $totalPrice = 0; // Initialize total price variable
                            @endphp
                            @foreach($cart as $id => $item)
                                @php
                                    $totalPrice += $item->price * $item->quantity; // Calculate total price
                                @endphp
                                <div class="cart-item">
                                    <h3 class="cart-header text-xl font-bold">{{ $item->name }}</h3>
                                    <p class="text-sm text-gray-700">{{ $item->description }}</p>
                                    <p class="text-sm text-gray-700 pt-4">Price: ${{ number_format($item->price, 2) }}</p>
                                    <p class="text-sm text-gray-700">Quantity: {{ $item->quantity }}</p>
                                    <div class="flex items-center mt-2 gap-4 mt-8">
                                        @if ($item->quantity > 1)
                                            <button class="decrease-quantity text-red-500 border border-red-500 rounded px-2" data-id="{{ $item->productID }}">
                                                -
                                            </button>
                                        @endif
                                        <span class="mx-2 text-lg font-semibold">{{ $item->quantity }}</span>
                                        <button class="increase-quantity text-green-500 border border-green-500 rounded px-2" data-id="{{ $item->productID }}">
                                            +
                                        </button>
                                        <button class="remove-from-cart text-red-500 ml-4 border border-red-500 rounded px-2" data-id="{{ $item->productID }}">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <h3 class="font-bold text-white" style="border: 1px solid rgb(0, 0, 0);
                            border-radius: 0.5rem; 
                            padding: 1rem;
                            background-color: #2d3748;">Total Price: ${{ number_format($totalPrice, 2) }}</h3> <!-- Display total price -->
                            <button id="clear-cart" class="cart-button clear-cart">
                                Clear Cart
                            </button>
                            <button id="place-order" class="cart-button place-order"> <!--onclick="placeOrder()-->
                                Place Order
                            </button>
                        </div>
                    @else
                        <p class="text-white">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Modal -->
    <div id="payment-modal" class="modal-overlay hidden flex items-center justify-center">
        <div class="modal-content">
            <h2 class="modal-title">Select Payment Method</h2>
            <div class="payment-options">
                <div class="payment-option">
                    <img src="{{asset('images/cash.png')}}" alt="Cash">
                    <button class="payment-button" data-method="1">Cash</button>
                </div>
                <div class="payment-option">
                    <img src="{{asset('images/gcash.png')}}" alt="GCash">
                    <button class="payment-button" data-method="2">GCash</button>
                </div>
                <div class="payment-option">
                    <img src="{{asset('images/maya.png')}}" alt="PayMaya">
                    <button class="payment-button" data-method="3">PayMaya</button>
                </div>
                <div class="payment-option">
                    <img src="{{asset('images/paypal.jpg')}}" alt="PayPal">
                    <button class="payment-button" data-method="4">PayPal</button>
                </div>
                <div class="payment-option">
                    <img src="{{asset('images/visa.jpg')}}" alt="Visa">
                    <button class="payment-button" data-method="5">Visa</button>
                </div>
            </div>
            <button class="payment-button">CANCEL</button>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="code-modal" class="code-overlay hidden flex items-center justify-center"> <!-- Added 'hidden' class here -->
        <div class="modal-content">
            <p class="mb-6">Input the code:</p>
            <input type="text" id="code-input" placeholder="xxxx-xxxx" important>
            <button id="confirm-code" class="px-4 py-2 bg-blue-500 text-gray-700 rounded">CONFIRM</button>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="hidden flex items-center justify-center"> <!-- Added 'hidden' class here -->
        <div class="modal-content">
            <h3 class="text-lg font-semibold mb-4">Are you sure?</h3>
            <p class="mb-6">Do you really want to clear your cart?</p>
            <div class="flex justify-center gap-4">
                <button id="confirm-clear-cart" class="px-4 py-2 bg-red-500 text-gray-700 rounded">Yes</button>
                <button id="cancel-clear-cart" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">No</button>
            </div>
        </div>
    </div>
    <!-- Notification Dialog -->
    <div id="notification-dialog" class="notification">
        <span id="notification-message"></span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let slctd ;
    document.querySelectorAll('.payment-button').forEach(function(button) {
        button.addEventListener('click', function() {
            const selectedMethod = this.getAttribute('data-method');
             // Get the selected payment method
            console.log('Selected Payment Method:', selectedMethod); // Debugging
            slctd = selectedMethod;
            console.log('Selected Payment Method:', slctd);
            // Close the modal
            document.getElementById('payment-modal').classList.add('hidden');
            document.getElementById('payment-modal').style.display = 'none';
            if(selectedMethod !== null){
                document.getElementById('code-modal').classList.remove('hidden');
                document.getElementById('code-modal').style.display = 'flex';
            }
            
            
        });
    });
    document.getElementById('confirm-code').addEventListener('click', function() {
        // Show the modal
        document.getElementById('code-modal').classList.remove('hidden');
        document.getElementById('code-modal').style.display = 'flex';
        console.log('Selected Payment Method:', slctd);
        placeOrder(slctd);
    });
    document.getElementById('place-order').addEventListener('click', function() {
        // Show the modal
        document.getElementById('payment-modal').classList.remove('hidden');
        document.getElementById('payment-modal').style.display = 'flex';
    });

    function placeOrder(payment_id){
        fetch("{{ route('order.placeOrder') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ 
                payment_id:payment_id,
            })
        })
        .then(response => response.json())
        .then(data => {

            // Show notification
            showNotification(data.message);
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    function showNotification(message) {
        const notificationDialog = document.getElementById('notification-dialog');
        const notificationMessage = document.getElementById('notification-message');

        // Set the message text
        notificationMessage.textContent = message;

        // Show the notification
        notificationDialog.classList.add('show');

        // Hide the notification after 2 seconds
        setTimeout(() => {
            notificationDialog.classList.remove('show');
        }, 900);
    }
    $(document).ready(function() {
        // Increase quantity
        $(document).on('click', '.increase-quantity', function() {
            let productId = $(this).data('id');

            $.ajax({
                url: `/cart/increase/${productId}`,
                method: 'PATCH',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });

        // Decrease quantity
        $(document).on('click', '.decrease-quantity', function() {
            let productId = $(this).data('id');

            $.ajax({
                url: `/cart/decrease/${productId}`,
                method: 'PATCH',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });

        // Remove item from cart
        $(document).on('click', '.remove-from-cart', function() {
            let productId = $(this).data('id');

            $.ajax({
                url: `/cart/remove/${productId}`,
                method: 'DELETE',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });

        $('#clear-cart').on('click', function() {
            $('#confirmation-modal').css('display', 'flex');
        });

        // Confirm clear cart
        $('#confirm-clear-cart').on('click', function() {
            $.ajax({
                url: '/cart/clear',
                method: 'DELETE',
                data: { _token: $('meta[name="csrf-token"]').attr('content') },
                success: function(response) {
                    $('#confirmation-modal').css('display', 'none');
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error clearing cart: ' + xhr.responseText);
                    $('#confirmation-modal').css('display', 'none');
                }
            });
        });

        // Cancel clear cart
        $('#cancel-clear-cart').on('click', function() {
            $('#confirmation-modal').css('display', 'none');
        });
});

</script>

</x-app-layout>
