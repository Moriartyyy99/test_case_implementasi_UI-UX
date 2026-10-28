@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Reports</h1>
            <p class="text-gray-500 mt-1">Get insights from your business performance and track key metrics.</p>
        </div>

        @if (in_array($role, ['owner', 'manager']))
            <button
                class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                <span class="mr-2 text-lg leading-none">⬇</span> Export Report
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
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">💵
            </div>
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

    <!-- Area Grafik (Grid 12 Kolom) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 mb-6">
        <!-- Bar Chart (Diperlebar jadi 6 kolom) -->
        <div class="lg:col-span-6 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">
                        📊</div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Revenue & Expenses</h3>
                        <p class="text-[11px] text-gray-500">Monthly financial performance</p>
                    </div>
                </div>
                <div class="flex flex-col items-end space-y-2">
                    <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                        <option>Last 6 Months</option>
                    </select>
                    <div class="flex items-center space-x-3 text-[11px] font-medium text-gray-600">
                        <div class="flex items-center"><span class="w-2.5 h-2.5 bg-[#6D28D9] rounded-full mr-1.5"></span>
                            Revenue</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 bg-[#E9D5FF] rounded-full mr-1.5"></span>
                            Expenses</div>
                    </div>
                </div>
            </div>
            <div class="relative w-full h-56">
                <canvas id="reportBarChart"></canvas>
            </div>
        </div>

        <!-- Income Doughnut (Ramping: 3 kolom) -->
        <div class="lg:col-span-3 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center text-sm">📈
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Income Breakdown</h3>
                        <p class="text-[11px] text-gray-500">Total 85.000.000</p>
                    </div>
                </div>
                <div class="relative">
                    <select style="background-image: none;"
                        class="appearance-none text-[11px] font-medium border border-gray-200 rounded-md text-gray-600 py-1.5 pl-2 pr-6 focus:ring-0 bg-white cursor-pointer outline-none">
                        <option>This Month</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-1 text-gray-500">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-2 flex-grow">
                <div class="relative w-36 h-36 flex-shrink-0">
                    <canvas id="incomeChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-[15px] font-bold text-gray-900 text-center leading-tight mb-0.5">Rp 85 jt</span>
                        <span class="text-[10px] text-gray-500">Total income</span>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 text-[10px] w-full ml-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-[#6D28D9] rounded-full mr-1.5"></span>
                            Project</div>
                        <span class="font-bold text-gray-900">Rp 70 jt</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> Maint.
                        </div>
                        <span class="font-bold text-gray-900">Rp 10 jt</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span> Others
                        </div>
                        <span class="font-bold text-gray-900">Rp 5 jt</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expense Doughnut (Ramping: 3 kolom) -->
        <div class="lg:col-span-3 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">
                        🍩</div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Expense Breakdown</h3>
                        <p class="text-[11px] text-gray-500">Total 28.500.000</p>
                    </div>
                </div>
                <div class="relative">
                    <select style="background-image: none;"
                        class="appearance-none text-[11px] font-medium border border-gray-200 rounded-md text-gray-600 py-1.5 pl-2 pr-6 focus:ring-0 bg-white cursor-pointer outline-none">
                        <option>This Month</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-1 text-gray-500">
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-2 flex-grow">
                <div class="relative w-36 h-36 flex-shrink-0">
                    <canvas id="expenseReportChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-[11px] font-bold text-gray-900 text-center leading-tight">Rp 28.5 jt</span>
                        <span class="text-[8px] text-gray-500">Total Expenses</span>
                    </div>
                </div>
                <div class="flex flex-col space-y-1.5 text-[10px] w-full ml-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-[#6D28D9] rounded-full mr-1.5"></span>
                            Oper.</div>
                        <span class="font-bold text-gray-900">Rp 12 jt</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span>
                            Salaries</div>
                        <span class="font-bold text-gray-900">Rp 7.5 jt</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-orange-400 rounded-full mr-1.5"></span>
                            Software</div>
                        <span class="font-bold text-gray-900">Rp 7.5 jt</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-1.5"></span> Utils
                        </div>
                        <span class="font-bold text-gray-900">Rp 7.5 jt</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col xl:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search transactions, client, or description..."
                class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <span class="absolute left-3 top-2.5 text-gray-400 text-sm">🔍</span>
        </div>
        <select
            class="bg-white border border-gray-200 rounded-lg px-4 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Categories</option>
            <option>Project Payment</option>
            <option>Salaries</option>
        </select>
        <select
            class="bg-white border border-gray-200 rounded-lg px-4 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Status</option>
            <option>Completed</option>
            <option>In Progress</option>
        </select>
        <div class="relative xl:w-48">
            <input type="text" placeholder="Select date range"
                class="w-full px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
            <span class="absolute right-3 top-2.5 text-gray-400">📅</span>
        </div>
        <button
            class="flex items-center justify-center px-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
            <span class="mr-2">⚲</span> Clear Filter
        </button>
    </div>

    <!-- Bagian Bawah: Tabel & Top List -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

        <!-- Tabel Recent Transactions (Kiri, 8 Kolom) -->
        <!-- Tambahkan flex flex-col agar bisa menaruh pagination di bawah -->
        <div class="lg:col-span-8 bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="p-5 border-b border-gray-100 flex items-center space-x-2">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">📋
                </div>
                <h3 class="font-bold text-gray-900">Recent Transactions</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-[13px]">
                    <thead>
                        <tr
                            class="bg-gray-50 border-b border-gray-100 text-[11px] font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-3 py-3">#</th>
                            <th class="px-3 py-3 whitespace-nowrap">Date</th>
                            <th class="px-3 py-3 whitespace-nowrap">Transaction ID</th>
                            <th class="px-3 py-3 whitespace-nowrap">Type</th>
                            <th class="px-3 py-3 whitespace-nowrap">Category</th>
                            <th class="px-3 py-3 whitespace-nowrap">Client</th>
                            <th class="px-3 py-3 whitespace-nowrap">Amount</th>
                            <th class="px-3 py-3 whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-3 py-3">1</td>
                            <td class="px-3 py-3 text-gray-500 whitespace-nowrap">01 Aug 2026</td>
                            <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">TRX-001</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span>
                            </td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Project Payment</td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">PT Maju Jaya</td>
                            <td class="px-3 py-3 font-medium text-green-600 whitespace-nowrap">+Rp 50.000.000</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-3 py-3">2</td>
                            <td class="px-3 py-3 text-gray-500 whitespace-nowrap">02 Aug 2026</td>
                            <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">TRX-002</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-medium whitespace-nowrap">Expense</span>
                            </td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Software & Tools</td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Internal Operations</td>
                            <td class="px-3 py-3 font-medium text-red-600 whitespace-nowrap">-Rp 1.500.000</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-3 py-3">3</td>
                            <td class="px-3 py-3 text-gray-500 whitespace-nowrap">05 Aug 2026</td>
                            <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">TRX-003</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span>
                            </td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Project Payment</td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Toko Berkah</td>
                            <td class="px-3 py-3 font-medium text-green-600 whitespace-nowrap">+Rp 75.000.000</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-3 py-3">4</td>
                            <td class="px-3 py-3 text-gray-500 whitespace-nowrap">10 Aug 2026</td>
                            <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">TRX-004</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-medium whitespace-nowrap">Expense</span>
                            </td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Salaries</td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Internal Operations</td>
                            <td class="px-3 py-3 font-medium text-red-600 whitespace-nowrap">-Rp 5.000.000</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-3 py-3">5</td>
                            <td class="px-3 py-3 text-gray-500 whitespace-nowrap">12 Aug 2026</td>
                            <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">TRX-005</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span>
                            </td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">Project Payment</td>
                            <td class="px-3 py-3 text-gray-600 whitespace-nowrap">PT Cipta Solusi</td>
                            <td class="px-3 py-3 font-medium text-green-600 whitespace-nowrap">+Rp 45.000.000</td>
                            <td class="px-3 py-3"><span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In
                                    Progress</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination (Menggunakan mt-auto agar turun ke paling bawah) -->
            <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500 mt-auto">
                <div>Showing 1-5 of 64 transactions</div>
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
                </div>
            </div>
        </div>

        <!-- Top Lists (Kanan, 4 Kolom) -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Top Customers -->
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-2">
                        <div
                            class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-sm">
                            👥</div>
                        <h3 class="font-bold text-gray-900 text-sm">Top Customers by Order Value</h3>
                    </div>
                    <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                        <option>This Month</option>
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-[11px]">
                        <thead>
                            <tr class="bg-gray-50 font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-3 py-3 rounded-l-lg w-8">#</th>
                                <th class="px-3 py-3 whitespace-nowrap">Customer Name</th>
                                <th class="px-3 py-3 text-right rounded-r-lg w-32 whitespace-nowrap">Order Value</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">1</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">PT Maju Jaya</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 50.000.000</td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">2</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Toko Berkah</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 75.000.000</td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">3</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">PT Sinar Abadi</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 30.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Projects -->
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-sm">
                            📁</div>
                        <h3 class="font-bold text-gray-900 text-sm">Top Projects by Order Value</h3>
                    </div>
                    <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                        <option>This Month</option>
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-[11px]">
                        <thead>
                            <tr class="bg-gray-50 font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-3 py-3 rounded-l-lg w-8">#</th>
                                <th class="px-3 py-3 whitespace-nowrap">Project Name</th>
                                <th class="px-3 py-3 whitespace-nowrap">Client</th>
                                <th class="px-3 py-3 text-right rounded-r-lg w-32 whitespace-nowrap">Order Value</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">1</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Attendance Mobile App
                                </td>
                                <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Maju Jaya</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 50.000.000</td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">2</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">E-Commerce Website</td>
                                <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Toko Berkah</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 75.000.000</td>
                            </tr>
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-3 py-3">3</td>
                                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Company Profile</td>
                                <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Sinar Abadi</td>
                                <td class="px-3 py-3 text-right whitespace-nowrap">Rp 30.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Chart.js untuk Reports -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Bar Chart
            const ctx = document.getElementById('reportBarChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                    datasets: [{
                            label: 'Revenue',
                            data: [45, 52, 48, 65, 72, 85],
                            backgroundColor: '#6D28D9',
                            borderRadius: 4,
                            barPercentage: 0.6
                        },
                        {
                            label: 'Expenses',
                            data: [20, 25, 18, 30, 28, 28.5],
                            backgroundColor: '#E9D5FF',
                            borderRadius: 4,
                            barPercentage: 0.6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: {
                                display: false
                            },
                            grid: {
                                color: '#F3F4F6'
                            },
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value + ' jt';
                                },
                                font: {
                                    size: 10
                                },
                                color: '#6B7280'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11
                                },
                                color: '#6B7280'
                            }
                        }
                    }
                }
            });

            // 2. Income Doughnut
            const incomeCtx = document.getElementById('incomeChart').getContext('2d');
            new Chart(incomeCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Project', 'Maintenance', 'Others'],
                    datasets: [{
                        data: [70000000, 10000000, 5000000],
                        backgroundColor: ['#6D28D9', '#EF4444', '#22C55E'],
                        borderWidth: 0,
                        cutout: '65%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // 3. Expense Doughnut
            const expenseCtx = document.getElementById('expenseReportChart').getContext('2d');
            new Chart(expenseCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Operational', 'Salaries', 'Software', 'Utilities', 'Others'],
                    datasets: [{
                        data: [12000000, 7500000, 7500000, 7500000, 7500000],
                        backgroundColor: ['#6D28D9', '#EF4444', '#F97316', '#3B82F6', '#22C55E'],
                        borderWidth: 0,
                        cutout: '65%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
