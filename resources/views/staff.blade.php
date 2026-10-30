@extends('layouts.app')

@section('title', 'Staff')

@section('content')
    <div x-data="{ openModal: false }">
        <!-- Header Halaman -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Staff Management</h1>
                <p class="text-gray-500 mt-1">Manage company staff information.</p>
            </div>
            <button @click="openModal = true"
                class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                <x-icon name="plus" class="w-4 h-4 mr-2" />
                <span>Add Staff</span>
            </button>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Staff</p>
                    <h3 class="text-2xl font-bold text-gray-900">25</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
                    <x-icon name="users" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Active Staff</p>
                    <h3 class="text-2xl font-bold text-gray-900">22</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
                    <x-icon name="user-check" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Inactive Staff</p>
                    <h3 class="text-2xl font-bold text-gray-900">3</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                    <x-icon name="user-x" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Departments</p>
                    <h3 class="text-2xl font-bold text-gray-900">5</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                    <x-icon name="building" class="w-5 h-5" />
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col xl:flex-row gap-3 mb-6">
            <div class="relative flex-grow">
                <input type="text" placeholder="Search name, email, or department..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                    <x-icon name="search" class="w-4 h-4" />
                </div>
            </div>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-48">
                <option>All Departments</option>
                <option>Operations</option>
                <option>Finance</option>
                <option>HR</option>
                <option>Marketing</option>
                <option>IT</option>
            </select>
            <select
                class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>
            <div class="relative xl:w-48">
                <input type="text" placeholder="Select date joined"
                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
                <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                    <x-icon name="calendar" class="w-4 h-4" />
                </div>
            </div>
            <button
                class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
                <x-icon name="filter" class="w-4 h-4 mr-2" />
                <span>Clear Filter</span>
            </button>
        </div>

        <!-- Tabel Staff -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr
                            class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 rounded-tl-lg">#</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Department</th>
                            <th class="p-4">Position</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Date Joined</th>
                            <th class="p-4 text-center rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Baris 1 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">1</td>
                            <td class="p-4 flex items-center space-x-3">
                                <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/100?img=11" alt="">
                                <span class="font-medium text-gray-900">Andi Pratama</span>
                            </td>
                            <td class="p-4 text-gray-500">andi@gmail.com</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Operations</span>
                            </td>
                            <td class="p-4 text-gray-600">Project Coordinator</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">02 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Operations</span>
                            </td>
                            <td class="p-4 text-gray-600">Project Coordinator</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">05 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Operations</span>
                            </td>
                            <td class="p-4 text-gray-600">Project Specialist</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">08 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span>
                            </td>
                            <td class="p-4 text-gray-600">Finance Officer</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">10 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">HR</span>
                            </td>
                            <td class="p-4 text-gray-600">HR Specialist</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">12 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Marketing</span>
                            </td>
                            <td class="p-4 text-gray-600">Marketing Staff</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Inactive</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">15 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">IT</span>
                            </td>
                            <td class="p-4 text-gray-600">IT Support</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">18 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Operations</span>
                            </td>
                            <td class="p-4 text-gray-600">Task Coordinator</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">20 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span>
                            </td>
                            <td class="p-4 text-gray-600">Accounting Staff</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">25 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                                <span class="font-medium text-gray-900">Hendra Firmansyah</span>
                            </td>
                            <td class="p-4 text-gray-500">hendra@gmail.com</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-24 px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Marketing</span>
                            </td>
                            <td class="p-4 text-gray-600">Content Creator</td>
                            <td class="p-4"><span
                                    class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Inactive</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">28 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Staff"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Staff"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Staff"
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
                <div>Showing 1-10 of 25 staff</div>
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
                    </select>
                </div>
            </div>
        </div>

        <!-- ================= MODAL ADD STAFF ================= -->
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
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl flex flex-col max-h-[90vh]">

                    <!-- Header Modal -->
                    <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start flex-shrink-0">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Add New Staff</h3>
                            <p class="text-sm text-gray-500 mt-1">Assign an existing user to a department and position.</p>
                        </div>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Body Modal (Form) -->
                    <div class="bg-white px-8 py-4 space-y-6 overflow-y-auto flex-grow">

                        <!-- SECTION 1: User Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <x-icon name="user" class="w-5 h-5" />
                                <span class="font-bold text-sm">User Information</span>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Select User <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Choose a user account</option>
                                    <option>Andi Pratama (andi@gmail.com)</option>
                                    <option>Siti Amanda (siti@gmail.com)</option>
                                </select>
                                <p class="text-[11px] text-gray-400 mt-1">Select an existing user account from the Users
                                    module.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" value="—" disabled
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" value="—" disabled
                                        class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Staff Details -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                               <x-icon name="briefcase" class="w-5 h-5" />
                                <span class="font-bold text-sm">Staff Details</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Department <span
                                            class="text-red-500">*</span></label>
                                    <select
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                        <option value="">Select department</option>
                                        <option>Operations</option>
                                        <option>Finance</option>
                                        <option>HR</option>
                                        <option>Marketing</option>
                                        <option>IT</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Position <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="e.g. UI/UX Designer"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Employment Status <span
                                            class="text-red-500">*</span></label>
                                    <select
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Date
                                        (Optional)</label>
                                    <input type="date"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                                <textarea rows="2" placeholder="Enter additional information..."
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                <div class="text-right text-xs text-gray-400 mt-1">0/300</div>
                            </div>
                        </div>

                    </div>

                    <!-- Footer Modal (Tombol Aksi) -->
                    <div
                        class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200 flex-shrink-0">
                        <button @click="openModal = false" type="button"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                            Cancel
                        </button>
                        <button type="button"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                            Add Staff
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
