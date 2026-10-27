<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexxManage - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F3F4F6] font-sans antialiased text-gray-800">
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
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('dashboard') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <span class="mr-3">⊞</span> Dashboard
                    </a>
                </div>

                <!-- WORKSPACE -->
                <div class="space-y-1">
                    <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">Workspace</p>

                    <a href="{{ route('projects') }}"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('projects') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <span class="mr-3">📁</span> Projects
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">🛒</span> Orders
                    </a>

                    <a href="{{ route('tasks') }}"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition {{ request()->routeIs('tasks') ? 'bg-white text-[#2D1B69]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                        <span class="mr-3">📋</span> Tasks
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">👤</span> Customers
                    </a>
                </div>

                <!-- FINANCIAL -->
                <div class="space-y-1">
                    <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">Financial</p>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">💳</span> Finance
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">📈</span> Reports
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">💵</span> Expenses
                    </a>
                </div>

                <!-- ADMINISTRATION -->
                <div class="space-y-1">
                    <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1 mt-4">
                        Administration</p>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">👥</span> Users
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">🛡️</span> Roles & Permissions
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">🧑‍💼</span> Staff
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 rounded-lg font-bold text-sm transition text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="mr-3">🕒</span> Log Activity
                    </a>
                </div>

            </nav>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- ================= TOPBAR ================= -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">

                <!-- Bagian Kiri: Dinamis (Company Name atau Breadcrumb) -->
                <div class="text-sm font-bold text-gray-900 flex items-center">
                    @if (request()->routeIs('dashboard'))
                        <!-- Jika di Dashboard, tampilkan nama perusahaan -->
                        <span class="mr-2 text-gray-400">🏢</span>
                        {{ Auth::user()->company_name ?? 'My Company' }}
                    @else
                        <!-- Jika di halaman lain, tampilkan Breadcrumb yang bisa diklik -->
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-500 hover:text-[#6D28D9] font-normal transition">Dashboard</a>
                        <span class="mx-2 text-gray-400 font-normal">/</span>
                        <span class="text-gray-900">
                            @if (request()->routeIs('projects'))
                                Projects
                            @elseif(request()->routeIs('tasks'))
                                Tasks
                            @elseif(request()->routeIs('users'))
                                <!-- Antisipasi kalau nanti ada halaman users -->
                                Users
                            @elseif(request()->routeIs('finance'))
                                <!-- Antisipasi kalau nanti ada halaman finance -->
                                Finance
                            @else
                                {{ ucfirst(request()->path()) }} <!-- Fallback otomatis -->
                            @endif
                        </span>
                    @endif
                </div>

                <!-- Bagian Kanan: Search & Profile -->
                <div class="flex items-center space-x-6 pr-4"> <!-- pr-4 memberi jarak ke kanan -->

                    <!-- Search Bar -->
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search anything..."
                            class="w-64 pl-10 pr-4 py-2 bg-gray-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                        <span class="absolute left-3 top-2.5 text-gray-400">🔍</span>
                    </div>

                    <!-- Notifikasi -->
                    <button class="text-gray-400 hover:text-gray-600 text-xl">🔔</button>

                    <!-- Profile Dropdown (Alpine.js) -->
                    <div x-data="{ open: false }" class="relative border-l pl-6 border-gray-200">
                        <!-- Tombol Trigger -->
                        <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                            <!-- Avatar -->
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                                alt="Profile" class="w-9 h-9 rounded-full">

                            <!-- Nama & Role -->
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800 leading-tight">{{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-gray-500 leading-tight">Owner</p>
                            </div>

                            <!-- Ikon Panah Bawah -->
                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200"
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Menu Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50"
                            style="display: none;">
                            <!-- Menu Settings -->
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6D28D9] transition">
                                Settings
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            <!-- Menu Logout -->
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
