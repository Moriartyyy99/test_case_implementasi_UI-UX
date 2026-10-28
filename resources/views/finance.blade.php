@extends('layouts.app')

@section('title', 'Finance')

@section('content')
    <div x-data="{ openModal: false, txType: 'income' }">
        <!-- Header Halaman -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Finance Management</h1>
                <p class="text-gray-500 mt-1">Track and manage all income, expenses, and financial transactions</p>
            </div>

            @if (in_array($role, ['owner', 'finance']))
                <button @click="openModal = true"
                    class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                    <span class="mr-2 text-lg leading-none">+</span> New Transaction
                </button>
            @endif
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp 85.000.000</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">📈</div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Expenses</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp 28.500.000</h3>
                    <p class="text-xs text-red-500 font-medium mt-2">↓ 12% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">📉</div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Net Profit</p>
                    <h3 class="text-2xl font-bold text-gray-900">Rp 56.500.000</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 32% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">💵</div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Transactions</p>
                    <h3 class="text-2xl font-bold text-gray-900">64</h3>
                    <p class="text-xs text-green-500 font-medium mt-2">↑ 18% from last month</p>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">📄</div>
            </div>
        </div>

        <!-- Area Grafik -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Grafik Revenue & Expenses (Kiri, 2 Kolom) -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📊</div>
                        <div>
                            <h3 class="font-bold text-gray-900">Revenue & Expenses</h3>
                            <p class="text-xs text-gray-500">Monthly financial performance</p>
                        </div>
                    </div>
                    <!-- Dropdown & Legend Manual -->
                    <div class="flex flex-col items-end space-y-2">
                        <select class="text-sm border-gray-200 rounded-md text-gray-500 focus:ring-0">
                            <option>Last 6 Months</option>
                        </select>
                        <div class="flex items-center space-x-3 text-[11px] font-medium text-gray-600">
                            <div class="flex items-center">
                                <span class="w-2.5 h-2.5 bg-[#6D28D9] rounded-full mr-1.5"></span> Revenue
                            </div>
                            <div class="flex items-center">
                                <span class="w-2.5 h-2.5 bg-[#E9D5FF] rounded-full mr-1.5"></span> Expenses
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative w-full h-64">
                    <canvas id="financeBarChart"></canvas>
                </div>
            </div>

            <!-- Expense Breakdown (Kanan, 1 Kolom) -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">🍩</div>
                        <div>
                            <h3 class="font-bold text-gray-900">Expense Breakdown</h3>
                            <p class="text-xs text-gray-500">Total 28.500.000</p>
                        </div>
                    </div>
                    <select class="text-sm border-gray-200 rounded-md text-gray-500 focus:ring-0">
                        <option>This Month</option>
                    </select>
                </div>

                <div class="flex items-center justify-between mt-2 flex-grow">
                    <div class="relative w-32 h-32">
                        <canvas id="expenseDoughnutChart"></canvas>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-sm font-bold text-gray-900">Rp 28.5 jt</span>
                            <span class="text-[10px] text-gray-500">Total Expenses</span>
                        </div>
                    </div>

                    <div class="space-y-2 text-xs flex-1 ml-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center"><span class="w-2.5 h-2.5 bg-[#6D28D9] rounded-full mr-2"></span> Operational</div>
                            <span class="font-bold text-gray-900">Rp 12.000.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center"><span class="w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span> Salaries</div>
                            <span class="font-bold text-gray-900">Rp 7.500.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center"><span class="w-2.5 h-2.5 bg-orange-400 rounded-full mr-2"></span> Software & Tools</div>
                            <span class="font-bold text-gray-900">Rp 7.500.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center"><span class="w-2.5 h-2.5 bg-blue-500 rounded-full mr-2"></span> Others</div>
                            <span class="font-bold text-gray-900">Rp 1.500.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col xl:flex-row gap-3 mb-6">
            <div class="relative flex-grow">
                <input type="text" placeholder="Search transaction, client, or description..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                <span class="absolute left-3 top-3 text-gray-400">🔍</span>
            </div>
            <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
                <option>All Type</option>
                <option>Income</option>
                <option>Expense</option>
            </select>
            <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
                <option>All Status</option>
                <option>Completed</option>
                <option>In Progress</option>
                <option>Pending</option>
            </select>
            <div class="relative xl:w-48">
                <input type="text" placeholder="Select date range"
                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
                <span class="absolute right-3 top-3 text-gray-400">📅</span>
            </div>
            <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
                <span class="mr-2">⚲</span> Clear Filter
            </button>
        </div>

        <!-- Tabel Transaksi -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 rounded-tl-lg">#</th>
                            <th class="p-4">Date</th>
                            <th class="p-4">Transaction ID</th>
                            <th class="p-4">Type</th>
                            <th class="p-4">Category</th>
                            <th class="p-4">Description</th>
                            <th class="p-4">Client</th>
                            <th class="p-4">Amount</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-center rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">1</td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">TRX-001</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Income</span></td>
                            <td class="p-4 text-gray-600">Project Payment</td>
                            <td class="p-4 text-gray-500">PT Maju Jaya - Down Payment</td>
                            <td class="p-4 text-gray-600">PT Maju Jaya</td>
                            <td class="p-4 font-medium text-green-600 whitespace-nowrap">+Rp 50.000.000</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span></td>
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
                            <td class="p-4 text-gray-500 whitespace-nowrap">02 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">TRX-002</td>
                            <td class="p-4"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Expense</span></td>
                            <td class="p-4 text-gray-600">Software & Tools</td>
                            <td class="p-4 text-gray-500">Adobe Creative Cloud Subscription</td>
                            <td class="p-4 text-gray-600">Internal Operations</td>
                            <td class="p-4 font-medium text-red-600 whitespace-nowrap">-Rp 1.500.000</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span></td>
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
                            <td class="p-4 font-medium text-gray-900">TRX-003</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Income</span></td>
                            <td class="p-4 text-gray-600">Project Payment</td>
                            <td class="p-4 text-gray-500">Toko Berkah - Full Payment</td>
                            <td class="p-4 text-gray-600">Toko Berkah</td>
                            <td class="p-4 font-medium text-green-600 whitespace-nowrap">+Rp 75.000.000</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span></td>
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
                            <td class="p-4 text-gray-500 whitespace-nowrap">10 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">TRX-004</td>
                            <td class="p-4"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Expense</span></td>
                            <td class="p-4 text-gray-600">Salaries</td>
                            <td class="p-4 text-gray-500">Staff Salary - August 2026</td>
                            <td class="p-4 text-gray-600">Internal Operations</td>
                            <td class="p-4 font-medium text-red-600 whitespace-nowrap">-Rp 5.000.000</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span></td>
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
                            <td class="p-4 text-gray-500 whitespace-nowrap">12 Aug 2026</td>
                            <td class="p-4 font-medium text-gray-900">TRX-005</td>
                            <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Income</span></td>
                            <td class="p-4 text-gray-600">Project Payment</td>
                            <td class="p-4 text-gray-500">PT Cipta Solusi - Milestone 1</td>
                            <td class="p-4 text-gray-600">PT Cipta Solusi</td>
                            <td class="p-4 font-medium text-green-600 whitespace-nowrap">+Rp 45.000.000</td>
                            <td class="p-4"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">In Progress</span></td>
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
                <div>Showing 1-5 of 64 transactions</div>
                <div class="flex items-center space-x-2">
                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                    <button class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">2</button>
                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">3</button>
                    <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                    <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                        <option>8 / page</option>
                        <option>10 / page</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- ================= MODAL NEW TRANSACTION ================= -->
        <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
            
            <!-- Overlay Hitam -->
            <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="openModal = false"></div>

            <!-- Kotak Modal -->
            <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
                <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl">
                    
                    <!-- Header Modal -->
                    <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Create New Transaction</h3>
                            <p class="text-sm text-gray-500 mt-1">Record a new income or expense transaction.</p>
                        </div>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                    <!-- Body Modal (Form) -->
                    <div class="bg-white px-8 py-4 space-y-6">
                        
                        <!-- SECTION 1: Transaction Information -->
                        <div>
                            <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📄</span>
                                <span class="font-bold text-sm">Transaction Information</span>
                            </div>

                            <!-- Transaction Type (Custom Toggle) & Date -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Transaction Type <span class="text-red-500">*</span></label>
                                    <div class="flex bg-gray-50 border border-gray-200 rounded-lg p-1">
                                        <!-- Tombol Income -->
                                        <button type="button" @click="txType = 'income'" :class="txType === 'income' ? 'bg-white text-green-600 shadow-sm border border-gray-200' : 'text-gray-500 hover:text-gray-700'" class="flex-1 flex items-center justify-center py-1.5 text-sm font-medium rounded-md transition">
                                            <span class="mr-1 text-xs">▼</span> Income
                                        </button>
                                        <!-- Tombol Expense -->
                                        <button type="button" @click="txType = 'expense'" :class="txType === 'expense' ? 'bg-white text-red-600 shadow-sm border border-gray-200' : 'text-gray-500 hover:text-gray-700'" class="flex-1 flex items-center justify-center py-1.5 text-sm font-medium rounded-md transition">
                                            <span class="mr-1 text-xs">▲</span> Expense
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Transaction Date <span class="text-red-500">*</span></label>
                                    <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <!-- Category & Amount -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                                    <input type="text" placeholder="e.g. Project Payment, Operational, Software & Tools" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                    <p class="text-[11px] text-gray-400 mt-1">Enter the transaction category manually.</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount (Rp) <span class="text-red-500">*</span></label>
                                    <input type="number" placeholder="e.g. 5000000" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Transaction Details -->
                        <div>
                            <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <span class="text-lg">📝</span>
                                <span class="font-bold text-sm">Transaction Details</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Related To (Optional)</label>
                                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                        <option>Select related project or order</option>
                                        <option>Project: Attendance Mobile App</option>
                                        <option>Order: ORD-001</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Client / Related Party (Optional)</label>
                                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                        <option>Select client or related party</option>
                                        <option>PT Maju Jaya</option>
                                        <option>Toko Berkah</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-500">*</span></label>
                                <textarea rows="2" placeholder="Enter transaction description..." class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                            </div>
                        </div>

                        <!-- SECTION 3: Status -->
                        <div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Transaction Status <span class="text-red-500">*</span></label>
                                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                        <option>Completed</option>
                                        <option>In Progress</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer Modal (Tombol Aksi) -->
                    <div class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200">
                        <button @click="openModal = false" type="button" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                            Cancel
                        </button>
                        <button type="button" class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                            Create Transaction
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Chart.js untuk Finance (Diletakkan di luar modal) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Grafik Revenue & Expenses (Bar Chart)
            const ctx = document.getElementById('financeBarChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                    datasets: [
                        { label: 'Revenue', data: [45, 52, 48, 65, 72, 85], backgroundColor: '#6D28D9', borderRadius: 4, barPercentage: 0.6 },
                        { label: 'Expenses', data: [20, 25, 18, 30, 28, 28.5], backgroundColor: '#E9D5FF', borderRadius: 4, barPercentage: 0.6 }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            border: { display: false }, 
                            grid: { color: '#F3F4F6' },
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value + ' jt'; // Format sumbu Y
                                },
                                font: { size: 10 },
                                color: '#6B7280'
                            }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { font: { size: 11 }, color: '#6B7280' }
                        }
                    }
                }
            });

            // 2. Grafik Expense Breakdown (Doughnut Chart)
            const expenseCtx = document.getElementById('expenseDoughnutChart').getContext('2d');
            new Chart(expenseCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Operational', 'Salaries', 'Software', 'Others'],
                    datasets: [{
                        data: [12000000, 7500000, 7500000, 1500000],
                        backgroundColor: ['#6D28D9', '#EF4444', '#F97316', '#3B82F6'],
                        borderWidth: 0,
                        cutout: '65%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        });
    </script>
@endsection