<x-app-layout>
    <style>
        /* Dark Theme Styling */
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #ffffff;
        }

        /* Container Styling */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding-left: 16px;
            padding-right: 16px;
        }

        /* Card-like styling */
        .card {
            background-color: #2d3748;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem; /* Rounded corners */
            padding: 24px; /* Padding equivalent to 6 Tailwind */
        }

        .card-text {
            color: #1a202c; /* Dark gray color for text (equivalent to text-gray-900) */
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #2d3748;
        }

        th, td {
            padding: 12px;
            text-align: left;
            color: #e0e0e0;
        }

        th {
            background-color: rgb(10, 10, 10);
            color: #ffffff;
        }

        tr:hover {
            background-color: #2d3748;
        }

        /* Action Links Styling */
        a {
            color: #1a73e8;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Confirmation Styling */
        .confirmation {
            color: #f44336;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        .modal-content {
            background-color: #333;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            color: #ffffff;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 5px;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        /* Button Styling */
        button {
            padding: 10px 20px;
            background-color: #1a73e8;
            border: none;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0c5fb1;
        }

        /* Input Styling */
        input[type="text"],
        input[type="email"] {
            padding: 8px;
            width: 100%;
            background-color: #444;
            border: 1px solid #888;
            color: #fff;
            margin-top: 5px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #1a73e8;
        }

        /* Cancel Button Styling */
        button[type="button"] {
            background-color: #f44336;
            margin-left: 10px;
        }

        button[type="button"]:hover {
            background-color: #d32f2f;
        }
    </style>

    <div class="container py-12">
        <div class="card">
            <div class="card-text">
                <h2>Customers</h2>

                <!-- Table to display users -->
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if ($user->role == 'rider')
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="#" onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')">Edit</a> | 
                                        <a href="{{ route('admin.users.destroy', $user->id) }}" 
                                           onclick="event.preventDefault(); 
                                           confirmDelete({{ $user->id }})">Delete</a>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Edit User</h3>
            <form id="editForm" method="POST" action="{{ route('admin.users.update', 'user_id_placeholder') }}">
                @csrf
                @method('PUT')  <!-- This specifies that this is a PUT request -->
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="modalName" name="name" value="" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="modalEmail" name="email" value="" required>
                </div>
                <div>
                    <button type="button" onclick="closeModal()">Cancel</button>
                    <button type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal(userId, userName, userEmail) {
            console.log('Opening modal for user ID:', userId);
            // Set the form action to include the user ID
            const formAction = document.getElementById('editForm');
            formAction.action = formAction.action.replace('user_id_placeholder', userId);

            // Set the form fields to the current user's data
            document.getElementById('modalName').value = userName;
            document.getElementById('modalEmail').value = userEmail;

            // Display the modal
            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('editModal').style.display = 'none';
        }

        // Close the modal if the user clicks outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeModal();
            }
        }

        // Delete confirmation
        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
</x-app-layout>
