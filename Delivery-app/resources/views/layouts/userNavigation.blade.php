<nav class="nav-container">
    <style>
        .nav-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgb(0, 0, 0);
            border-bottom: 1px solid #e2e8f0;
            padding: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .logo {
            margin-right: 20px;
        }

        .nav-links {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-grow: 1;
        }

        .nav-link {
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: color 0.2s, background-color 0.2s;
        }

        .nav-link:hover {
            color: #000000;
            background-color: lightgray;
        }

        .nav-link.active {
            color: #2d3748;
            background-color: #ffffff;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-button {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: color 0.2s, background-color 0.2s;
        }

        .dropdown-button:hover {
            background-color: lightgray;
            color: #000000;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 4px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: #2d3748;
            text-decoration: none;
            padding: 10px 16px;
            display: block;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: lightgray;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown svg {
            color: #ffffff;
        }
        /* Logo on the left */
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            max-width: 60px;
            height: auto;
            border-radius: 50%;
        }
    </style>
    
    <!-- Logo -->
    <div class="logo">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt=""></a>

    </div>

    <!-- Navigation Menu -->
    <div class="nav-links">
        <!-- Home -->
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75V7.13c0-.89.72-1.62 1.62-1.62h2.18m6.4 4.47L3 20m12-9.94v8.06M4 21h16M12 2l8 8M12 2L4 10" />
            </svg>
            {{ __('Home') }}
        </a>

        <!-- Menu -->
        <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            {{ __('Menu') }}
        </a>

        <!-- Cart -->
        <a href="{{ route('user.cart') }}" class="nav-link {{ request()->routeIs('user.cart') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.6 3M7 16h10l1.4-7H5.4m-.6 7H17m-6 4a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
            </svg>
            {{ __('Cart') }}
        </a>

        <a href="{{ route('user.orderDetails') }}" class="nav-link {{ request()->routeIs('user.orderDetails') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.104 0 2-.895 2-2s-.896-2-2-2-2 .895-2 2 .896 2 2 2zm0 4c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zM5 8H3m18 0h-2M5 16H3m18 0h-2m2-8h-1m0 8h1M4 6h16m0 8H4" />
            </svg>
            {{ __('Order Details') }}
        </a>
    </div>

    <!-- Profile & Logout Dropdown -->
    <div class="dropdown">
        <a class="dropdown-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018.538 16H15.46a4 4 0 013.417 1.804M9 11a4 4 0 100-8 4 4 0 000 8zM21 20a9 9 0 10-18 0h18z" />
            </svg>
            {{-- {{ __('Account') }} --}}
        </a>
        <div class="dropdown-content">
            <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</nav>
