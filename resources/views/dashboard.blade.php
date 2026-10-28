@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Header Halaman -->
    <div class="mb-6">
        <h1 class="text-4xl font-bold text-gray-900">Welcome Back, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-500 mt-1">Here's what's happening at {{ Auth::user()->company_name ?? 'your company' }} today.
        </p>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 20% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">📁</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pending Tasks</p>
                <h3 class="text-2xl font-bold text-gray-900">28</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 12% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">📋</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">36</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 18% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">🛒</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Revenue</p>
                <h3 class="text-2xl font-bold text-gray-900">Rp 85.000.000</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">💵</div>
        </div>
    </div>

    <!-- Area Grafik & Tugas -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Grafik Revenue (Kiri, 2 Kolom) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <!-- Judul dengan Icon -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📊</div>
                    <div>
                        <h3 class="font-bold text-gray-900">Revenue Overview</h3>
                        <p class="text-xs text-gray-500">Monthly revenue performance</p>
                    </div>
                </div>
                <select class="text-sm border-gray-200 rounded-md text-gray-500 focus:ring-0">
                    <option>Last 6 Months</option>
                </select>
            </div>
            <div class="relative w-full h-72">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Task Summary (Kanan, 1 Kolom) -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <!-- Judul dengan Icon -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">📋</div>
                    <div>
                        <h3 class="font-bold text-gray-900">Task Summary</h3>
                        <p class="text-xs text-gray-500">Total 100 Tasks</p>
                    </div>
                </div>
                <select class="text-sm border-gray-200 rounded-md text-gray-500 focus:ring-0">
                    <option>This Month</option>
                </select>
            </div>

            <!-- Pembungkus Grafik Donat & Keterangan -->
            <div class="flex items-center justify-between mt-2 flex-grow">
                <!-- Grafik Donat (Diperbesar) -->
                <div class="relative w-44 h-44">
                    <canvas id="taskChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-2xl font-bold text-gray-900">100</span>
                        <span class="text-[10px] text-gray-500">Tasks</span>
                    </div>
                </div>

                <!-- Legenda (Diberi jarak ml-6 agar lebih ke kanan) -->
                <div class="space-y-4 text-sm flex-1 ml-8">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                            Completed</div>
                        <span class="font-bold text-gray-900">45</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-3 h-3 bg-[#6D28D9] rounded-full mr-2"></span> In
                            Progress</div>
                        <span class="font-bold text-gray-900">35</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center"><span class="w-3 h-3 bg-orange-400 rounded-full mr-2"></span> To Do
                        </div>
                        <span class="font-bold text-gray-900">20</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Projects & Recent Orders -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Recent Projects -->
        <div class="lg:col-span-7 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📁</div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Recent Projects</h3>
                        <p class="text-xs text-gray-500">Latest project updates</p>
                    </div>
                </div>
                <a href="{{ route('projects') }}"
                    class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                    View All Projects <span class="ml-1 text-lg">&rarr;</span>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3 rounded-l-lg">#</th>
                            <th class="px-4 py-3">Project Name</th>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Progress</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Deadline</th>
                            <th class="px-4 py-3 rounded-r-lg text-center">Team</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris 1 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Attendance Mobile App</td>
                            <td class="px-4 py-3 text-gray-500">PT Maju Jaya</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 65%"></div>
                                    </div>
                                    <span class="text-xs font-bold">65%</span>
                                </div>
                            </td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In
                                    Progress</span></td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap">30 Nov 2026</td>
                            <td class="px-4 py-3">
                                <div class="flex -space-x-2 justify-center">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=1" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=2" alt="">
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-[10px] text-gray-600 font-bold">
                                        +2</div>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris 2 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3 font-medium text-gray-900">E-Commerce Website</td>
                            <td class="px-4 py-3 text-gray-500">Toko Berkah</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <span class="text-xs font-bold">85%</span>
                                </div>
                            </td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">In
                                    Progress</span></td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap">15 Nov 2026</td>
                            <td class="px-4 py-3">
                                <div class="flex -space-x-2 justify-center">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=3" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=4" alt="">
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-[10px] text-gray-600 font-bold">
                                        +3</div>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris 3 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Company Profile</td>
                            <td class="px-4 py-3 text-gray-500">PT Sinar Abadi</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 100%"></div>
                                    </div>
                                    <span class="text-xs font-bold">100%</span>
                                </div>
                            </td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span>
                            </td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap">10 Okt 2026</td>
                            <td class="px-4 py-3">
                                <div class="flex -space-x-2 justify-center">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=5" alt="">
                                    <img class="w-6 h-6 rounded-full border-2 border-white"
                                        src="https://i.pravatar.cc/100?img=6" alt="">
                                    <div
                                        class="w-6 h-6 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-[10px] text-gray-600 font-bold">
                                        +1</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="lg:col-span-5 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">🛒</div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Recent Orders</h3>
                        <p class="text-xs text-gray-500">Latest customer orders</p>
                    </div>
                </div>
                <a href="#" class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                    View All Orders <span class="ml-1 text-lg">&rarr;</span>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3 rounded-l-lg">#</th>
                            <th class="px-4 py-3">Order ID</th>
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3 rounded-r-lg">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3 font-medium text-gray-900">ORD-001</td>
                            <td class="px-4 py-3 text-gray-500">PT Maju Jaya</td>
                            <td class="px-4 py-3 text-gray-900">Rp 50.000.000</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">In
                                    Progress</span></td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3 font-medium text-gray-900">ORD-002</td>
                            <td class="px-4 py-3 text-gray-500">Toko Berkah</td>
                            <td class="px-4 py-3 text-gray-900">Rp 75.000.000</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">In
                                    Progress</span></td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3 font-medium text-gray-900">ORD-003</td>
                            <td class="px-4 py-3 text-gray-500">PT Sinar Abadi</td>
                            <td class="px-4 py-3 text-gray-900">Rp 30.000.000</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Script untuk merender grafik -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Setup Grafik Revenue (Bar Chart)
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    datasets: [{
                        label: 'Revenue',
                        data: [45, 52, 48, 65, 72, 85], // Data dummy (dalam juta)
                        backgroundColor: '#6D28D9',
                        borderRadius: 6,
                        barThickness: 40
                    }]
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
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 2. Setup Grafik Task (Doughnut Chart)
            const taskCtx = document.getElementById('taskChart').getContext('2d');
            new Chart(taskCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'In Progress', 'To Do'],
                    datasets: [{
                        data: [45, 35, 20],
                        backgroundColor: ['#22C55E', '#6D28D9', '#FB923C'],
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
