@extends('layouts.app')

@section('title', 'Log Activity')

@section('content')
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Activity Log</h1>
            <p class="text-gray-500 mt-1">Track and monitor all important activities in NexxManage.</p>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Activities</p>
                <h3 class="text-2xl font-bold text-gray-900">124</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 12% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
    <x-icon name="clipboard" class="w-5 h-5" />
</div>
        </div>
        
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">User Activities</p>
                <h3 class="text-2xl font-bold text-gray-900">65</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 8% from last month</p>
            </div>
           <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
    <x-icon name="users" class="w-5 h-5" />
</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Project Activities</p>
                <h3 class="text-2xl font-bold text-gray-900">32</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 23% from last month</p>
            </div>
           <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
    <x-icon name="folder" class="w-5 h-5" />
</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">System Activities</p>
                <h3 class="text-2xl font-bold text-gray-900">27</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 8% from last month</p>
            </div>
           <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-600">
    <x-icon name="settings" class="w-5 h-5" />
</div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col xl:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search by username, action, or module..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
    <x-icon name="search" class="w-4 h-4" />
</div>
        </div>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-44">
            <option>All Modules</option>
            <option>Project</option>
            <option>Task</option>
            <option>Order</option>
            <option>Customer</option>
            <option>Finance</option>
            <option>User</option>
            <option>Staff</option>
            <option>Expense</option>
        </select>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Actions</option>
            <option>Created</option>
            <option>Updated</option>
            <option>Deleted</option>
            <option>Logged in</option>
        </select>
        <div class="relative xl:w-48">
            <input type="text" placeholder="Select date range" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
           <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
    <x-icon name="calendar" class="w-4 h-4" />
</div>
        </div>
        <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
            <x-icon name="filter" class="w-4 h-4 mr-2" />
<span>Clear Filter</span>
        </button>
    </div>

    <!-- Tabel Log Activity -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="p-4 rounded-tl-lg">#</th>
                        <th class="p-4">Date & Time</th>
                        <th class="p-4">User</th>
                        <th class="p-4">Action</th>
                        <th class="p-4">Module</th>
                        <th class="p-4 rounded-tr-lg">Details</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Baris 1 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">1</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">18 Oct 2026, 14:32</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=11" alt="">
                            <span class="font-medium text-gray-900">Andi Pratama</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Created</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Project</span></td>
                        <td class="p-4 text-gray-500">Created project "Website Redesign"</td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">18 Oct 2026, 13:31</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=5" alt="">
                            <span class="font-medium text-gray-900">Siti Amanda</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Updated</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-orange-100 text-orange-700 rounded-md text-xs font-medium">Task</span></td>
                        <td class="p-4 text-gray-500">Updated task "Design Homepage"</td>
                    </tr>
                    <!-- Baris 3 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">3</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">18 Oct 2026, 11:22</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=12" alt="">
                            <span class="font-medium text-gray-900">Budi Raharjo</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Created</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Order</span></td>
                        <td class="p-4 text-gray-500">Created order #ORD-0012</td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">17 Oct 2026, 16:32</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=9" alt="">
                            <span class="font-medium text-gray-900">Dewi Lestari</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Deleted</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Customer</span></td>
                        <td class="p-4 text-gray-500">Deleted customer "PT Maju Bersama"</td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">17 Oct 2026, 10:12</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=8" alt="">
                            <span class="font-medium text-gray-900">Andi Rukmana</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Updated</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-teal-100 text-teal-700 rounded-md text-xs font-medium">Finance</span></td>
                        <td class="p-4 text-gray-500">Updated payment #PAY-0034</td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">17 Oct 2026, 15:32</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=10" alt="">
                            <span class="font-medium text-gray-900">Nina Triana</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Created</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">User</span></td>
                        <td class="p-4 text-gray-500">Created new user "Nina Triana"</td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">16 Oct 2026, 13:11</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=3" alt="">
                            <span class="font-medium text-gray-900">Rizky Maulana</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Updated</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Staff</span></td>
                        <td class="p-4 text-gray-500">Updated staff profile</td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">16 Oct 2026, 09:20</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=13" alt="">
                            <span class="font-medium text-gray-900">Dimas Pratama</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Created</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-orange-100 text-orange-700 rounded-md text-xs font-medium">Expense</span></td>
                        <td class="p-4 text-gray-500">Created Expense "Office Supplies"</td>
                    </tr>
                    <!-- Baris 9 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">9</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">16 Oct 2026, 14:32</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=4" alt="">
                            <span class="font-medium text-gray-900">Citra Lestari</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Logged in</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-gray-100 text-gray-700 rounded-md text-xs font-medium">System</span></td>
                        <td class="p-4 text-gray-500">User logged in to the system</td>
                    </tr>
                    <!-- Baris 10 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">10</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">15 Oct 2026, 17:05</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://i.pravatar.cc/100?img=7" alt="">
                            <span class="font-medium text-gray-900">Hendra Firmansyah</span>
                        </td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Updated</span></td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-24 px-2 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Project</span></td>
                        <td class="p-4 text-gray-500">Updated project "Mobile App"</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
            <div>Showing 1-10 of 124 activities</div>
            <div class="flex items-center space-x-2">
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">2</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">3</button>
                <span class="px-1 text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">13</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                    <option>10 / page</option>
                    <option>20 / page</option>
                </select>
            </div>
        </div>
    </div>
@endsection