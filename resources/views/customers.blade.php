@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div x-data="{ openModal: false }">
        <!-- Header Halaman -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Customer Management</h1>
                <p class="text-gray-500 mt-1">Manage all your customers and their information in one place</p>
            </div>

            @if (in_array($role, ['owner', 'manager']))
                <button @click="openModal = true"
                    class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                    <span class="mr-2 text-lg leading-none">+</span> New Customer
                </button>
            @endif
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Customers</p>
                    <h3 class="text-2xl font-bold text-gray-900">30</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">👥
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">New Customers</p>
                    <h3 class="text-2xl font-bold text-gray-900">3</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 100% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">👤
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Active Customers</p>
                    <h3 class="text-2xl font-bold text-gray-900">24</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 33% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">✅
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Inactive Customers</p>
                    <h3 class="text-2xl font-bold text-gray-900">6</h3>
                    <p class="text-xs text-red-500 font-medium mt-2">↓ 12% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">👤</div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col xl:flex-row gap-3 mb-6">
            <div class="relative flex-grow">
                <input type="text" placeholder="Search order ID, client, or service..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                <span class="absolute left-3 top-3 text-gray-400">🔍</span>
            </div>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-48">
                <option>All Industries</option>
                <option>Education</option>
                <option>Retail</option>
                <option>Technology</option>
            </select>
            <div class="relative xl:w-48">
                <input type="text" placeholder="Select date range"
                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
                <span class="absolute right-3 top-3 text-gray-400">📅</span>
            </div>
            <button
                class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
                <span class="mr-2">⚲</span> Clear Filter
            </button>
        </div>

        <!-- Tabel Customers -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="p-4 rounded-tl-lg">#</th>
                        <th class="p-4">Customer Name</th>
                        <th class="p-4">Contact Person</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4 text-center">Orders</th>
                        <th class="p-4 text-center">Projects</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center rounded-tr-lg">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <!-- Baris 1 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">1</td>
                        <td class="p-4 font-bold text-gray-900">PT Maju Jaya</td>
                        <td class="p-4 text-gray-800 font-medium">Budi Santoso</td> <!-- Contact Person Baru -->
                        <td class="p-4 text-gray-500">majujaya@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0812 3456 7890</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4 font-bold text-gray-900">Toko Berkah</td>
                        <td class="p-4 text-gray-800 font-medium">Siti Aminah</td>
                        <td class="p-4 text-gray-500">Siti tokoberkah@gmail.com</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0813 5674 8755</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 3 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">3</td>
                        <td class="p-4 font-bold text-gray-900">PT Sinar Abadi</td>
                        <td class="p-4 text-gray-800 font-medium">Andi Wijaya</td>
                        <td class="p-4 text-gray-500">sinarabadi@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0812 2222 6565</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4 font-bold text-gray-900">PT Cipta Solusi</td>
                        <td class="p-4 text-gray-800 font-medium">Rina Kartika</td>
                        <td class="p-4 text-gray-500">Ciptasolusi@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0812 3342 4455</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4 font-bold text-gray-900">CV Maju Sentosa</td>
                        <td class="p-4 text-gray-800 font-medium">Dedi Kurniawan</td>
                        <td class="p-4 text-gray-500">majusentosa@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0813 7768 6868</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4 font-bold text-gray-900">Yayasan Harapan</td>
                        <td class="p-4 text-gray-800 font-medium">Hendra Firmansyah</td>
                        <td class="p-4 text-gray-500">harapan@yayasan.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0812 1111 2222</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4 font-bold text-gray-900">PT Retail Indonesia</td>
                        <td class="p-4 text-gray-800 font-medium">Nina Triana</td>
                        <td class="p-4 text-gray-500">retailindonesia@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0813 0000 9999</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4 font-bold text-gray-900">PT Global Teknologi</td>
                        <td class="p-4 text-gray-800 font-medium">Dian Natalia</td>
                        <td class="p-4 text-gray-500">globalteknologi@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0812 4040 4040</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 9 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">9</td>
                        <td class="p-4 font-bold text-gray-900">PT Harapan Baru</td>
                        <td class="p-4 text-gray-800 font-medium">Rizky Maulana</td>
                        <td class="p-4 text-gray-500">harapanbaru@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0813 1818 1919</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                    <!-- Baris 10 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">10</td>
                        <td class="p-4 font-bold text-gray-900">PT Sentosa</td>
                        <td class="p-4 text-gray-800 font-medium">Citra Lestari</td>
                        <td class="p-4 text-gray-500">sentosa@company.co.id</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">0813 7568 3674</td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4 text-center"><span class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-bold">1</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Inactive</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            @if (in_array($role, ['owner', 'manager']))
                                <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                <button class="text-gray-400 hover:text-red-500">🗑️</button>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>

            <!-- Pagination -->
            <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
                <div>Showing 1-10 of 30 customers</div>
                <div class="flex items-center space-x-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">3</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                    <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                        <option>10 / page</option>
                        <option>20 / page</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- ================= MODAL NEW CUSTOMER ================= -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog"
            aria-modal="true">

            <!-- Overlay Hitam -->
            <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="openModal = false"></div>

            <!-- Kotak Modal -->
            <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
                <div x-show="openModal" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">

                    <!-- Header Modal -->
                    <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Create New Customer</h3>
                            <p class="text-sm text-gray-500 mt-1">Fill in the customer details to add a new customer.</p>
                        </div>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body Modal (Form) -->
                    <div class="bg-white px-8 py-4 space-y-6 max-h-[75vh] overflow-y-auto">

                        <!-- SECTION 1: Company Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📄</span>
                                <span class="font-bold text-sm">Company Information</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Company Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Enter company name (e.g. PT Maju Jaya)"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Industry <span
                                            class="text-red-500">*</span></label>
                                    <!-- Diubah menjadi input text -->
                                    <input type="text" placeholder="Enter industry"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address (Optional)</label>
                                    <textarea rows="2" placeholder="Enter company address..."
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                    <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Company Website
                                        (Optional)</label>
                                    <input type="url" placeholder="Enter website URL (e.g. www.example.com)"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Contact Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">👤</span>
                                <span class="font-bold text-sm">Contact Information</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Contact Person <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Enter contact person name"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Position (Optional)</label>
                                    <input type="text" placeholder="Enter position (e.g. CEO, Project Manager)"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email <span
                                            class="text-red-500">*</span></label>
                                    <input type="email" placeholder="Enter email address"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span
                                            class="text-red-500">*</span></label>
                                    <div
                                        class="flex rounded-lg border border-gray-300 focus-within:ring-[#6D28D9] focus-within:border-[#6D28D9] overflow-hidden">
                                        <span
                                            class="bg-gray-50 text-gray-600 px-3 py-2.5 text-sm border-r border-gray-300 font-medium flex items-center whitespace-nowrap">
                                            ID +62 <span class="ml-1 text-[10px] text-gray-400">▼</span>
                                        </span>
                                        <input type="tel" placeholder="Enter phone number"
                                            class="w-full px-4 py-2.5 text-sm focus:outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 3: Additional Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📝</span>
                                <span class="font-bold text-sm">Additional Information</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Customer Status <span
                                            class="text-red-500">*</span></label>
                                    <select
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    <p class="text-[11px] text-gray-400 mt-1">Active customers can be selected for new
                                        orders and projects.</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                                    <textarea rows="2" placeholder="Enter additional notes..."
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                    <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer Modal (Tombol Aksi) -->
                    <div class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200">
                        <button @click="openModal = false" type="button"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                            Cancel
                        </button>
                        <button type="button"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                            Create Customer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
