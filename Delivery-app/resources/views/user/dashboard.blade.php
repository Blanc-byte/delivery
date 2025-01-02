<x-app-layout>
    <!-- Notification Dialog -->
    <div id="notification-dialog" class="notification">
        <span id="notification-message"></span>
    </div>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome User:)') }} 
            Auth::user()->name
        </h2>
    </x-slot> --}}
    
    <div class="py-12 backgroundAll">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background-color: white;">
                <div class="container mx-auto mt-10 cons">
                    <h1 class="text-4xl font-bold mb-8 labelsss"></h1>
                    <div class="category-filter">
                        <select id="category" onchange="filterProductsByCategory(this.value)">
                            <option value="" class="cattt">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category }}" class="cattt">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <!-- Example in a navigation bar -->
                        {{-- <a href="{{ route('wishlist.view') }}" title="View Wishlist" class="text-white flex align center">
                            WISHLIST
                            <button class="wishlist-button">
                                <svg class="wishlist-icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                            </button>
                        </a> --}}
                    </div>
                    {{-- <div class="sort-options">
                        <div class="sort-option">
                            <label for="sort">Sort by:</label>
                            <select id="sort" onchange="applyFilter()">
                                <option value="name">Name</option>
                                <option value="price">Price</option>
                            </select>
                        </div>
                        
                        <div class="sort-option">
                            <label for="order">Order:</label>
                            <select id="order" onchange="applyFilter()">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>
                        
                    </div> --}}

                    {{-- <form method="GET" action="{{ route('dashboard.search') }}" class="mb-8 search-form">
                        <input type="text" name="query" placeholder="Search products..." class="search-input required">
                        <button type="submit" class="search-button">Search</button>
                    </form> --}}

                    <div class="product-grid">
                        @foreach($products as $product)
                            <div class="product-card">
                                <div class="p-4 card">
                                    <div class="flex-grow">
                                        <h2 class="text-xl font-semibold mt-2">{{ $product->name }}</h2>
                                        <p class="text-sm text-gray-700 pt-4">{{ $product->description }}</p>
                                        <p class="text-sm font-bold num underline">Price: ${{ number_format($product->price, 2) }}</p>
                                        
                                        @foreach ($ratings as $rating)
                                            @if ($rating->product_id === $product->id)
                                                <p class="text-sm text-gray-700 pt-4">Ratings: {{ $rating->star }}</p>
                                            @endif
                                        @endforeach

                                    </div>
                                    <button class="mt-4 add-to-cart" onclick="toggleCart(this)"
                                        data-id="{{ $product->id }}" 
                                        data-name="{{ $product->name }}" 
                                        data-description="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                    >
                                        {{-- <span class="button-text">Add</span> --}}
                                        <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="currentColor" d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2zM7.01 9h9.87l-.94 4H8.05l-1.04-4zm2-5h4l1 4h-6z"></path>
                                        </svg>
                                        <svg class="check-icon hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="currentColor" d="M9 16.2l-3.5-3.5-1.4 1.4L9 19l10-10-1.4-1.4z"></path>
                                        </svg>
                                    </button>
                                    <button class="add-to-cart" onclick="openRatingModal({{ $product->id }})">
                                        <svg class="star-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path fill="currentColor" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"></path>
                                        </svg>
                                    </button>
                                    {{-- <button class="wishlist-button" onclick="addToWishlist({{ $product->id }})">
                                        <svg class="wishlist-icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                        </svg>
                                    </button> --}}
                                    

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Rating Modal (hidden by default) -->
<div id="ratingModal" class="rating-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button" onclick="closeRatingModal()">&times;</span>
        <h2>Rate this Product</h2>
        <form id="ratingForm" method="POST" action="{{ route('product.rate', ':id') }}">
            @csrf
            <input type="hidden" id="productId" name="product_id">
            <label for="stars">Select Rating:</label>
            <select name="stars" id="stars" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button type="submit">Submit Rating</button>
            <button onclick="closeRatingModal()" style="background-color: rgb(245, 81, 81)">Cancel</button>
        </form>
    </div>
</div>
<script>
    // Function to open the modal and set the product ID in the form
    function openRatingModal(productId) {
        // Set the product ID in the hidden field
        document.getElementById('productId').value = productId;
        
        // Set the form action with the correct route
        var formAction = "{{ route('product.rate', ':id') }}";
        formAction = formAction.replace(':id', productId);
        document.getElementById('ratingForm').action = formAction;
        
        // Display the modal
        document.getElementById('ratingModal').style.display = 'flex';
    }

    // Function to close the modal
    function closeRatingModal() {
        document.getElementById('ratingModal').style.display = 'none';
    }
</script>

    <script>
        function applyFilter() {
            const category = document.getElementById('category').value; 
            const sort = document.getElementById('sort').value;
            const order = document.getElementById('order').value;

            filterProductsByCategory(category, sort, order);
        }
        
        function filterProductsByCategory(category, sort = 'name', order = 'asc') {
            fetch(`/filter-products?category=${category}&sort=${sort}&order=${order}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                const productGrid = document.querySelector('.product-grid');
                productGrid.innerHTML = ''; // Clear current products

                // Display filtered and sorted products
                data.products.forEach(product => {
                    productGrid.innerHTML += `
                        <div class="product-card">
                            <div class="p-4 card">
                                <div class="flex-grow">
                                    <h2 class="text-xl font-semibold mt-2">${product.name}</h2>
                                    <p class="text-gray-600 mt-3">${product.description}</p>
                                    <p class="text-lg font-bold mt-2 num">$${parseFloat(product.price).toFixed(2)}</p>
                                </div>
                                @foreach ($ratings as $rating)
                                    @if ($rating->product_id === $product->id)
                                        <p class="text-sm text-gray-700 pt-4">Ratings: {{ $rating->star }}</p>
                                    @endif
                                @endforeach
                                <button class="mt-4 add-to-cart" onclick="toggleCart(this)"
                                    data-id="${product.id}" 
                                    data-name="${product.name}" 
                                    data-description="${product.description}"
                                    data-price="${product.price}"
                                >
                                    <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="currentColor" d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2zM7.01 9h9.87l-.94 4H8.05l-1.04-4zm2-5h4l1 4h-6z"></path>
                                    </svg>
                                    <svg class="check-icon hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="currentColor" d="M9 16.2l-3.5-3.5-1.4 1.4L9 19l10-10-1.4-1.4z"></path>
                                    </svg>
                                </button>
                                <button class="add-to-cart" onclick="openRatingModal(${product.price})">
                                    <svg class="star-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="currentColor" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => console.error('Error:', error));
        }
        function addToWishlist(productId) {
            fetch('/wishlist/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message);  // Show the notification with the message
            })
            .catch(error => console.error('Error:', error));
        }
        function toggleCart(button) {
            const cartIcon = button.querySelector('.cart-icon');
            const checkIcon = button.querySelector('.check-icon');

            // Switch icons
            cartIcon.classList.toggle('hidden');
            checkIcon.classList.toggle('hidden');

            // Retrieve item data
            const itemId = button.getAttribute('data-id');

            // Send POST request
            fetch('/add-to-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ id: itemId })
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message);  // Show the notification with the message
            })
            .catch(error => console.error('Error:', error));
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
            }, 2000);
        }
    </script>
    <style>
        /* Style for the product grid */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .product-card {
            width: 240px;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style for the modal */
        .rating-modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Style for the form inside the modal */
        form {
            margin-top: 20px;
        }

        form select,
        form button {
            padding: 10px;
            margin-top: 10px;
            width: 100%;
            border-radius: 4px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .sort-option label{
            color: white;
        }
        .sort-option{
            display: flex;
            flex-direction: column;
        }
        .sort-options {
            display: flex;
            justify-content:flex-start;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .wishlist-button {
            background-color: rgb(255, 0, 0) ;
            color: white ;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
            height: 30px;
            width: 55px;
        }

        .wishlist-icon {
            fill: white;
        }
        .cattt{
            width: 9000px;
        }

        .category-filter {
            display: flex;
            justify-content:space-between ;
            align-items: center;
            gap: 10px;
            margin: 5px 10px 20px 10px;
            font-family: Arial, sans-serif;
        }
        .category-filter select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f9f9f9;
            color: #333;
            cursor: pointer;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .category-filter select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .category-filter select option {
            padding: 5px;
        }

        .backgroundAll{
            /* background-image: url("{{ asset('images/b2.jpg') }}");  
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; */
            
        }
        .search-form {
            
            display: flex;
            align-items: flex-end;
            gap: 10px;
            margin-bottom: 20px;
            margin-left: auto;
        }

        .search-input {
            margin-left: auto;
            width: 400px;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .search-button {
            background-color:#3b82f6;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .search-button:hover {
            background-color: #2563eb;
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 20px;
            height: 100%;
        }
        
        .labelsss {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 2rem;
            color: white;
        }
        
        .cons {
            padding: 20px;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }
    
        .product-card {
            background-color:rgb(255, 255, 255);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
        }
    
        .product-card:hover {
            transform: scale(1.05);
            background-color: #e0e0e0;
        }
    
        .add-to-cart {
            background-color: rgb(75, 75, 75) ;
            color: white ;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
            height: 30px;
            width: 30;
        }

        .add-to-cart:hover {
            background-color: rgb(0, 0, 0) ;
        }

        .hidden {
            display: none;
        }
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%) translateY(-20px);
            background-color: hsl(180, 100%, 50%) ;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 8px black (218, 217, 217, 0.2);
            opacity: 0; /* Starts as invisible */
            visibility: hidden; /* Ensure it's not interactable when hidden */
            z-index: 1000;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .notification.show {
            opacity: 1; 
            visibility: visible;
            transform: translateX(-50%) translateY(10px); /* Small movement */
        }

        .star-icon{
            color: gold;
        }

    </style>
</x-app-layout>
