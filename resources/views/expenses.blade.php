@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
    <div x-data="{ openModal: false }">
        <!-- Header Halaman -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Expenses Management</h1>
                <p class="text-gray-500 mt-1">Manage and track all company expenses in one place.</p>
            </div>

            @if (in_array($role, ['owner', 'finance']))
                <button @click="openModal = true"
                    class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                    <span class="mr-2 text-lg leading-none">+</span> New Expense
                </button>
            @endif
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Expenses</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp 28.500.000</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 12% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">🧾
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Records</p>
                    <h3 class="text-2xl font-bold text-gray-900">12</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 33% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">📄
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Largest Category</p>
                    <h3 class="text-xl font-bold text-gray-900">Operational</h3>
                    <p class="text-xs text-gray-600 mt-1">Rp 12.000.000</p>
                    <p class="text-xs text-green-500 font-medium mt-1">↑ 42% of total expenses</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">⏱️</div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">This Month</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp 8.500.000</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 18% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">📅
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col xl:flex-row gap-3 mb-6">
            <div class="relative flex-grow">
                <input type="text" placeholder="Search expense name, category, or description..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                <span class="absolute left-3 top-3 text-gray-400">🔍</span>
            </div>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-48">
                <option>All Categories</option>
                <option>Operational</option>
                <option>Salaries</option>
                <option>Software & Tools</option>
                <option>Utilities</option>
                <option>Others</option>
            </select>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
                <option>All Status</option>
                <option>Paid</option>
                <option>Pending</option>
                <option>Cancelled</option>
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

        <!-- Tabel Expenses -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 rounded-tl-lg">#</th>
                            <th class="p-4">Date</th>
                            <th class="p-4">Expense ID</th>
                            <th class="p-4">Expense Name</th>
                            <th class="p-4">Category</th>
                            <th class="p-4">Amount</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-center rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">1</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-001</td>
                            <td class="p-4 text-gray-600">Office Rent</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Operational</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 5.000.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">2</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">03 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-002</td>
                            <td class="p-4 text-gray-600">Staff Salaries</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Salaries</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 7.500.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">3</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">05 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-003</td>
                            <td class="p-4 text-gray-600">Figma Subscription</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Software
                                    & Tools</span></td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 350.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">4</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">08 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-004</td>
                            <td class="p-4 text-gray-600">Google Workspace</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Software
                                    & Tools</span></td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 750.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Pending</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">5</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">10 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-005</td>
                            <td class="p-4 text-gray-600">Electricity Bill</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Utilities</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 1.750.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">6</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">12 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-006</td>
                            <td class="p-4 text-gray-600">Internet & Wifi</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Utilities</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 750.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">7</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">15 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-007</td>
                            <td class="p-4 text-gray-600">Office Supplies</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Operational</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 1.500.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Pending</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">8</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">18 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-008</td>
                            <td class="p-4 text-gray-600">Other Expenses</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Others</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 2.500.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">9</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">22 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-009</td>
                            <td class="p-4 text-gray-600">Printer Maintenance</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Operational</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 750.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Paid</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
                                    <button class="text-gray-400 hover:text-orange-500">✏️</button>
                                    <button class="text-gray-400 hover:text-red-500">🗑️</button>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">10</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">25 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">EXP-010</td>
                            <td class="p-4 text-gray-600">Transportation</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Others</span>
                            </td>
                            <td class="p-4 text-gray-900 whitespace-nowrap">Rp 650.000</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Cancelled</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2 text-lg">
                                <button class="text-gray-400 hover:text-blue-500">👁️</button>
                                @if (in_array($role, ['owner', 'finance']))
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
                <div>Showing 1-10 of 12 expenses</div>
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

        <!-- ================= MODAL NEW EXPENSE ================= -->
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
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">

                    <!-- Header Modal -->
                    <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Create New Expense</h3>
                            <p class="text-sm text-gray-500 mt-1">Record and manage a new company expense.</p>
                        </div>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body Modal (Form) -->
                    <div class="bg-white px-8 py-4 space-y-6">

                        <!-- SECTION 1: Expense Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📄</span>
                                <span class="font-bold text-sm">Expense Information</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Expense Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="e.g. Office Rent"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="e.g. Operational"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Expense Date <span
                                            class="text-red-500">*</span></label>
                                    <input type="date"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount (Rp) <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" placeholder="e.g. 5000000"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Additional Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📝</span>
                                <span class="font-bold text-sm">Additional Information</span>
                            </div>

                            <div class="mb-5">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description (Optional)</label>
                                <textarea rows="3" placeholder="Enter expense details..."
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                            </div>

                            <div class="w-full md:w-1/2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Expense Status <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                    <option>Pending</option>
                                    <option>Paid</option>
                                    <option>Cancelled</option>
                                </select>
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
                            Create Expense
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
