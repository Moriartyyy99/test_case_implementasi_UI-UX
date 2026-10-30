<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexxManage - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-[#F3F4F6] font-sans antialiased text-gray-800">
    
    <!-- KUNCI UTAMA: Ambil role dari database user yang login -->
    @php
        $role = Auth::user()->role ?? 'owner';
    @endphp

    <div class="flex h-screen overflow-hidden">

        <!-- ================= SIDEBAR ================= -->
        <aside class="w-64 bg-[#2D1B69] text-white flex flex-col hidden md:flex">
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-white/10 font-bold text-xl tracking-wide">
                <img src="{{ asset('images/sidelogo.png') }}" alt="Logo" class="w-8 h-8 mr-3 object-contain">
                NexxManage.
            </div>

            <!-- Menu Sidebar -->
            <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">

                <!-- MENU UTAMA -->
                <div class="space-y-1">
                    <a href="{{ route('dashboard', ['role' => $role]) }}"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('dashboard') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                </div>

                <!-- WORKSPACE -->
                <div class="space-y-1">
                    <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">Workspace</p>

                    @if (in_array($role, ['owner', 'manager', 'staff', 'finance']))
                        <a href="{{ route('projects', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('projects') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            Projects
                        </a>
                    @endif

                    @if (in_array($role, ['owner', 'manager', 'finance']))
                        <a href="{{ route('orders', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('orders') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Orders
                        </a>
                    @endif

                    @if (in_array($role, ['owner', 'manager', 'staff']))
                        <a href="{{ route('tasks', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('tasks') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            Tasks
                        </a>
                    @endif

                    @if ($role == 'owner')
                        <a href="{{ route('customers', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('customers') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Customers
                        </a>
                    @endif
                </div>

                <!-- FINANCIAL -->
                @if (in_array($role, ['owner', 'manager', 'finance']))
                    <div class="space-y-1">
                        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">Financial</p>

                        @if (in_array($role, ['owner', 'finance']))
                            <a href="{{ route('finance', ['role' => $role]) }}"
                                class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('finance') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                Finance
                            </a>
                        @endif

                        @if (in_array($role, ['owner', 'manager']))
                            <a href="{{ route('reports', ['role' => $role]) }}"
                                class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('reports') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                Reports
                            </a>
                        @endif

                        @if (in_array($role, ['owner', 'finance']))
                            <a href="{{ route('expenses', ['role' => $role]) }}"
                                class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('expenses') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                Expenses
                            </a>
                        @endif
                    </div>
                @endif

                <!-- ADMINISTRATION -->
                @if ($role == 'owner')
                    <div class="space-y-1">
                        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">Administration</p>

                        <a href="{{ route('users', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('users') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Users
                        </a>

                        <a href="{{ route('roles', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('roles') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            Roles & Permissions
                        </a>

                        <a href="{{ route('staff', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('staff') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                            Staff
                        </a>

                        <a href="{{ route('logactivity', ['role' => $role]) }}"
                            class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('logactivity') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Log Activity
                        </a>
                    </div>
                @endif

            </nav>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- ================= TOPBAR ================= -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">

                <!-- Bagian Kiri: Dinamis (Company Name atau Breadcrumb) -->
                <div class="text-sm font-bold text-gray-900 flex items-center">
                    @if (request()->routeIs('dashboard'))
                        <!-- Icon Building -->
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        {{ Auth::user()->company_name ?? 'My Company' }}
                    @else
                        <a href="{{ route('dashboard', ['role' => $role]) }}"
                            class="text-gray-500 hover:text-[#6D28D9] font-normal transition">Dashboard</a>
                        <span class="mx-2 text-gray-400 font-normal">/</span>
                        <span class="text-gray-900">
                            @if (request()->routeIs('projects'))
                                Projects
                            @elseif(request()->routeIs('orders'))
                                Orders
                            @elseif(request()->routeIs('tasks'))
                                Tasks
                            @elseif(request()->routeIs('customers'))
                                Customers
                            @elseif(request()->routeIs('finance'))
                                Finance
                            @elseif(request()->routeIs('reports'))
                                Reports
                            @elseif(request()->routeIs('expenses'))
                                Expenses
                            @elseif(request()->routeIs('users'))
                                Users
                            @elseif(request()->routeIs('roles'))
                                Roles & Permissions
                            @elseif(request()->routeIs('staff'))
                                Staff
                            @elseif(request()->routeIs('logactivity'))
                                Log Activity
                            @else
                                {{ ucfirst(request()->path()) }}
                            @endif
                        </span>
                    @endif
                </div>

                <!-- Bagian Kanan: Search & Profile -->
                <div class="flex items-center space-x-6 pr-4">

                    <!-- Search Bar -->
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search anything..."
                            class="w-64 pl-10 pr-4 py-2 bg-gray-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                        <!-- Icon Search -->
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>

                    <!-- Notifikasi -->
                    <button class="text-gray-400 hover:text-gray-600">
                        <!-- Icon Bell -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>

                    <!-- Profile Dropdown (Alpine.js) -->
                    <div x-data="{ open: false }" class="relative border-l pl-6 border-gray-200">
                        <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                                alt="Profile" class="w-9 h-9 rounded-full">
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800 leading-tight">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 leading-tight capitalize">{{ $role }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200"
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50"
                            style="display: none;">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6D28D9] transition">
                                Settings
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ================= KONTEN HALAMAN ================= -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#F3F4F6] p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>