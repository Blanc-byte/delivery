<x-app-layout>
    <style>
        /* Dark Theme Styles */
        body {
            background-color: #1f2937; /* Dark background */
            color: #f3f4f6; /* Light text color */
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #4b5563; /* Border color */
        }

        thead tr {
            background-color: #374151; /* Header background */
        }

        th, td {
            border: 1px solid #4b5563; /* Border color */
            padding: 0.5rem 1rem;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        /* Button Styles */
        .button {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .button-blue {
            background-color: #3b82f6; /* Blue background */
            color: white;
        }

        .button-blue:hover {
            background-color: #2563eb; /* Blue hover */
        }

        .button-red {
            background-color: #ef4444; /* Red background */
            color: white;
        }

        .button-red:hover {
            background-color: #dc2626; /* Red hover */
        }

        /* Flexbox Styles */
        .flex {
            display: flex;
        }

        .space-x-2 > * + * {
            margin-left: 0.5rem;
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Darker overlay */
            justify-content: center;
            align-items: center;
            z-index: 50;
        }

        .modal-content {
            background: #2d3748; /* Dark modal content */
            border-radius: 0.5rem;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
        }

        /* Form and Input Styles */
        input, textarea {
            background-color: #374151; /* Dark background */
            border: 1px solid #4b5563; /* Border color */
            color: #f3f4f6; /* Text color */
            padding: 0.5rem;
            width: 100%;
        }

        input:focus, textarea:focus {
            border-color: #3b82f6; /* Blue border on focus */
            outline: none;
        }

        /* Modal Buttons */
        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Deleted Product List</h2>

                    <!-- Add Product Button -->
                    {{-- <button type="button" class="button button-blue mb-4" onclick="openAddModal()">
                        Add Product
                    </button> --}}

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td class="flex space-x-2">
                                        
                                        <!-- Remove Button -->
                                        <form action="{{ route('products.addAgain', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="button button-blue"
                                                    onclick="event.preventDefault(); openConfirmationModal(document.getElementById('delete-form-{{ $product->id }}'))">
                                                Add
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="modal-overlay hidden">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Are you sure you want to Add this product?</h2>
            <div class="modal-buttons">
                <button type="button" onclick="closeConfirmationModal()" class="button button-red">Cancel</button>
                <button id="confirm-delete-btn" type="button" class="button button-blue">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Edit/Add Modal -->
    <div id="edit-modal" class="modal-overlay hidden">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4" id="modal-title">Edit Product</h2>
            <form id="edit-form" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit-name" class="block text-sm font-bold mb-2">Name:</label>
                    <input id="edit-name" name="name" type="text" class="w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="edit-description" class="block text-sm font-bold mb-2">Description:</label>
                    <textarea id="edit-description" name="description" class="w-full p-2"></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit-price" class="block text-sm font-bold mb-2">Price:</label>
                    <input id="edit-price" name="price" type="number" step="0.01" class="w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="edit-category" class="block text-sm font-bold mb-2">Category:</label>
                    <input id="edit-category" name="category" type="text" class="w-full p-2">
                </div>
                <div class="modal-buttons">
                    <button type="button" onclick="closeEditModal()" class="button button-red">Cancel</button>
                    <button type="submit" class="button button-blue">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const editModal = document.getElementById('edit-modal');
        const editForm = document.getElementById('edit-form');
        const editName = document.getElementById('edit-name');
        const editDescription = document.getElementById('edit-description');
        const editPrice = document.getElementById('edit-price');
        const editCategory = document.getElementById('edit-category');
        const modalTitle = document.getElementById('modal-title');

        // Function to open the Add Modal
        function openAddModal() {
            modalTitle.textContent = 'Add Product'; // Change modal title to Add Product
            editForm.action = '{{ route("products.store") }}'; // Set action for adding a new product
            editName.value = '';
            editDescription.value = '';
            editPrice.value = '';
            editCategory.value = '';
            editModal.classList.remove('hidden');
            editModal.style.display = 'flex';
        }

        // Function to open the Edit Modal with data
        function openEditModal(id, name, description, price, category) {
            modalTitle.textContent = 'Edit Product'; // Change modal title to Edit Product
            editForm.action = `{{ route('products.update', '') }}/${id}`; // Set action for editing the product
            editName.value = name;
            editDescription.value = description;
            editPrice.value = price;
            editCategory.value = category;
            editModal.classList.remove('hidden');
            editModal.style.display = 'flex';
        }

        // Function to close the Edit/Add Modal
        function closeEditModal() {
            editModal.classList.add('hidden');
            editModal.style.display = 'none';
        }

        let deleteForm = null;

        // Open the confirmation modal and set the form for deletion
        function openConfirmationModal(form) {
            deleteForm = form;
            document.getElementById('confirmation-modal').classList.remove('hidden');
            document.getElementById('confirmation-modal').style.display = 'flex';
        }

        // Close the confirmation modal
        function closeConfirmationModal() {
            document.getElementById('confirmation-modal').classList.add('hidden');
            document.getElementById('confirmation-modal').style.display = 'none';
        }

        // Confirm deletion
        document.getElementById('confirm-delete-btn').onclick = function() {
            if (deleteForm) {
                deleteForm.submit();
            }
            closeConfirmationModal();
        }
    </script>
</x-app-layout>
