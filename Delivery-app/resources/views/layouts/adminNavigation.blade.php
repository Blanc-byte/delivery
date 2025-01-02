<nav class="nav-container">
    <style>
        /* Navigation Sidebar */
        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 200px;
            background-color: #1f2937; /* Dark background */
            border-right: 1px solid #4b5563; /* Darker border */
            padding: 16px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Links Container */
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* Styling for Navigation Links */
        .nav-link {
            color: #f3f4f6; /* Light text color */
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: color 0.2s, background-color 0.2s;
        }

        /* Hover and Active States for Links */
        .nav-link:hover,
        .nav-link.active {
            color: #2d3748; /* Darker text color on hover */
            background-color: #edf2f7; /* Light background on hover */
        }

        /* Logout Form Style */
        .logout-form {
            display: inline;
        }
    </style>

    <!-- Navigation Menu -->
    <div class="nav-links">
        <!-- Profile -->
        <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            {{ __('Profile') }}
        </a>

        <!-- Dashboard -->
        {{-- <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            {{ __('Dashboard') }}
        </a> --}}

        <!-- Products -->
        <a href="{{ route('admin.products') }}" class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}">
            {{ __('Products') }}
        </a>

        <a href="{{ route('admin.deletedProducts') }}" class="nav-link {{ request()->routeIs('admin.deletedProducts') ? 'active' : '' }}">
            {{ __('Deleted Products') }}
        </a>

        <!-- Users -->
        <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            {{ __('Customers') }}
        </a>

        <a href="{{ route('admin.riders') }}" class="nav-link {{ request()->routeIs('admin.riders') ? 'active' : '' }}">
            {{ __('Riders') }}
        </a>
        <!-- Log Out -->
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
</nav>
