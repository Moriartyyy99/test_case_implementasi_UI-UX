@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div x-data="{
    openModal: false,
    showPassword: false,
    showConfirmPassword: false
}">
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Users Management</h1>
            <p class="text-gray-500 mt-1">Manage company users, their roles, and access permissions.</p>
        </div>
        <button @click="openModal = true" class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
            <x-icon name="plus" class="w-4 h-4 mr-2" />
<span>New User</span>
        </button>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Users</p>
                <h3 class="text-2xl font-bold text-gray-900">22</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 20% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
    <x-icon name="users" class="w-5 h-5" />
</div>
        </div>
        
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Users</p>
                <h3 class="text-2xl font-bold text-gray-900">19</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
    <x-icon name="check-circle" class="w-5 h-5" />
</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Inactive Users</p>
                <h3 class="text-2xl font-bold text-gray-900">3</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 33% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
    <x-icon name="user-x" class="w-5 h-5" />
</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Roles</p>
                <h3 class="text-2xl font-bold text-gray-900">4</h3>
                <p class="text-xs text-gray-400 font-medium mt-2">from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
    <x-icon name="shield" class="w-5 h-5" />
</div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col xl:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search name, email, or role..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <x-icon name="search"
    class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" />
        </div>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Roles</option>
            <option>Owner</option>
            <option>Manager</option>
            <option>Finance</option>
            <option>Staff</option>
        </select>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Status</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
        <div class="relative xl:w-48">
            <input type="text" placeholder="Select date joined" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
            <x-icon name="calendar"
    class="w-4 h-4 text-gray-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" />
        </div>
        <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
            <x-icon name="filter" class="w-4 h-4 mr-2" />
<span>Clear Filter</span>
        </button>
    </div>

    <!-- Tabel Users -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="p-4 rounded-tl-lg">#</th>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Role</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Date Joined</th>
                        <th class="p-4">Last Active</th>
                        <th class="p-4 text-center rounded-tr-lg">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Baris 1 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">1</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=11" alt="">
                            <span class="font-medium text-gray-900">Fajri Nugroho</span>
                        </td>
                        <td class="p-4 text-gray-500">fajri@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Owner</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">1 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Today, 10:24</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=5" alt="">
                            <span class="font-medium text-gray-900">Siti Amanda</span>
                        </td>
                        <td class="p-4 text-gray-500">siti@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Manager</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">3 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Today, 09:15</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 3 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">3</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=12" alt="">
                            <span class="font-medium text-gray-900">Budi Raharjo</span>
                        </td>
                        <td class="p-4 text-gray-500">budi@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">10 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Yesterday, 17:42</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=9" alt="">
                            <span class="font-medium text-gray-900">Dewi Lestari</span>
                        </td>
                        <td class="p-4 text-gray-500">dewi@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">12 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Today, 08:50</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=8" alt="">
                            <span class="font-medium text-gray-900">Andi Rukmana</span>
                        </td>
                        <td class="p-4 text-gray-500">andi@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Manager</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">15 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Yesterday, 14:21</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=10" alt="">
                            <span class="font-medium text-gray-900">Nina Triana</span>
                        </td>
                        <td class="p-4 text-gray-500">nina@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Staff</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">18 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Today, 07:33</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=3" alt="">
                            <span class="font-medium text-gray-900">Rizky Maulana</span>
                        </td>
                        <td class="p-4 text-gray-500">rizky@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Staff</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Inactive</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">20 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">5 days ago</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=13" alt="">
                            <span class="font-medium text-gray-900">Dimas Pratama</span>
                        </td>
                        <td class="p-4 text-gray-500">dimas@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Manager</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">25 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Yesterday, 11:06</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 9 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">9</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=4" alt="">
                            <span class="font-medium text-gray-900">Citra Lestari</span>
                        </td>
                        <td class="p-4 text-gray-500">citra@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Inactive</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">28 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">12 days ago</td>
                        <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                    <!-- Baris 10 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">10</td>
                        <td class="p-4 flex items-center space-x-3">
                            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=7" alt="">
                            <span class="font-medium text-gray-900">Hendar Firmansyah</span>
                        </td>
                        <td class="p-4 text-gray-500">hendar@gmail.com</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Staff</span></td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span></td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">30 Jan 2026</td>
                        <td class="p-4 text-gray-500 whitespace-nowrap">Today, 09:18</td>
                       <td class="p-4">
    <div class="flex items-center justify-center gap-3">

        <button type="button" title="View User"
            class="text-blue-500 hover:text-blue-700 transition">
            <x-icon name="eye" class="w-4 h-4" />
        </button>

        <button type="button" title="Edit User"
            class="text-amber-500 hover:text-amber-700 transition">
            <x-icon name="edit" class="w-4 h-4" />
        </button>

        <button type="button" title="Delete User"
            class="text-red-500 hover:text-red-700 transition">
            <x-icon name="trash" class="w-4 h-4" />
        </button>

    </div>
</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
            <div>Showing 1-10 of 22 users</div>
            <div class="flex items-center space-x-2">
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">2</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">3</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                    <option>10 / page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- ================= MODAL NEW USER ================= -->
    <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        
        <!-- Overlay Hitam -->
        <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="openModal = false"></div>

        <!-- Kotak Modal -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl flex flex-col max-h-[90vh]">
                
                <!-- Header Modal -->
                <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start flex-shrink-0">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Create New User</h3>
                        <p class="text-sm text-gray-500 mt-1">Create a user account and assign access permissions.</p>
                    </div>
                    <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <!-- Body Modal (Form) -->
                <div class="bg-white px-8 py-4 space-y-6 overflow-y-auto flex-grow">
                    
                    <!-- SECTION 1: User Information -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <x-icon name="user" class="w-5 h-5" />
                            <span class="font-bold text-sm">User Information</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Enter full name" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" placeholder="e.g. user@company.com" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Role & Access -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <x-icon name="shield" class="w-5 h-5" />
                            <span class="font-bold text-sm">Role & Access</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">User Role <span class="text-red-500">*</span></label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Select role</option>
                                    <option>Owner</option>
                                    <option>Manager</option>
                                    <option>Finance</option>
                                    <option>Staff</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Account Status <span class="text-red-500">*</span></label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date Joined -->
                        <div class="w-full md:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date Joined <span class="text-red-500">*</span></label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                        </div>
                    </div>

                    <!-- SECTION 3: Account Security -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                           <x-icon name="lock" class="w-5 h-5" />
                            <span class="font-bold text-sm">Account Security</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Temporary Password & Note -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Temporary Password <span class="text-red-500">*</span></label>
                                <div class="relative mb-1">
                                    <input type="password" placeholder="Enter temporary password" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] pr-10">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </button>
                                </div>
                                <!-- Note diletakkan di sini -->
                                <p class="text-xs text-gray-500">The user will receive these credentials to access NexxManage.</p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="password" placeholder="Confirm password" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] pr-10">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Modal -->
                <div class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200 flex-shrink-0">
                    <button @click="openModal = false" type="button" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                        Cancel
                    </button>
                    <button type="button" class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                        Create User
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection