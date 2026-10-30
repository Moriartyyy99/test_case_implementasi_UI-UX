@extends('layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
    <div x-data="{ openModal: false }">
        <!-- Header Halaman -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Roles & Permissions</h1>
                <p class="text-gray-500 mt-1">Manage user roles and their access permissions across NexxManage.</p>
            </div>
            <button @click="openModal = true"
                class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
                <x-icon name="plus" class="w-4 h-4 mr-2" />
                <span>Add Role</span>
            </button>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Roles</p>
                    <h3 class="text-2xl font-bold text-gray-900">4</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
                    <x-icon name="shield" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Users</p>
                    <h3 class="text-2xl font-bold text-gray-900">22</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600">
                    <x-icon name="users" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Users with Role</p>
                    <h3 class="text-2xl font-bold text-gray-900">22</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                    <x-icon name="user-check" class="w-5 h-5" />
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Permissions</p>
                    <h3 class="text-2xl font-bold text-gray-900">28</h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">
                    <x-icon name="key" class="w-5 h-5" />
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="flex flex-col md:flex-row gap-3 mb-6">
            <div class="relative flex-grow">
                <input type="text" placeholder="Search role name or description..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
                <x-icon name="search"
                    class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" />
            </div>
            <button
                class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 md:w-40">
                <x-icon name="filter" class="w-4 h-4 mr-2" />
                <span>Clear Filter</span>
            </button>
        </div>

        <!-- Tabel Roles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr
                            class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="p-4 rounded-tl-lg">#</th>
                            <th class="p-4">Role Name</th>
                            <th class="p-4">Description</th>
                            <th class="p-4 text-center">Total Users</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Date Created</th>
                            <th class="p-4 text-center rounded-tr-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">1</td>
                            <td class="p-4"><span
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">Owner</span>
                            </td>
                            <td class="p-4 text-gray-500">Full access to all features and settings.</td>
                            <td class="p-4 text-center">1</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Role"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Role"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Role"
                                        class="text-red-500 hover:text-red-700 transition">
                                        <x-icon name="trash" class="w-4 h-4" />
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">2</td>
                            <td class="p-4"><span
                                    class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Manager</span>
                            </td>
                            <td class="p-4 text-gray-500">Can manage projects, orders, customers, and staff.</td>
                            <td class="p-4 text-center">4</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Role"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Role"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Role"
                                        class="text-red-500 hover:text-red-700 transition">
                                        <x-icon name="trash" class="w-4 h-4" />
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">3</td>
                            <td class="p-4"><span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Finance</span>
                            </td>
                            <td class="p-4 text-gray-500">Can access financial data, reports, and expenses.</td>
                            <td class="p-4 text-center">4</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Role"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Role"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Role"
                                        class="text-red-500 hover:text-red-700 transition">
                                        <x-icon name="trash" class="w-4 h-4" />
                                    </button>

                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="p-4">4</td>
                            <td class="p-4"><span
                                    class="px-3 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Staff</span>
                            </td>
                            <td class="p-4 text-gray-500">Can manage assigned tasks and view related data.</td>
                            <td class="p-4 text-center">10</td>
                            <td class="p-4"><span
                                    class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Active</span>
                            </td>
                            <td class="p-4 text-gray-500 whitespace-nowrap">01 Jan 2026</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-3">

                                    <button type="button" title="View Role"
                                        class="text-blue-500 hover:text-blue-700 transition">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Edit Role"
                                        class="text-amber-500 hover:text-amber-700 transition">
                                        <x-icon name="edit" class="w-4 h-4" />
                                    </button>

                                    <button type="button" title="Delete Role"
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
                <div>Showing 1-4 of 4 roles</div>
                <div class="flex items-center space-x-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                    <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                        <option>4 / page</option>
                        <option>8 / page</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Matriks Permission -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Permission Matrix</h3>
                    <p class="text-sm text-gray-500 mt-1">View and manage module access permissions for each role.</p>
                </div>
                <!-- Legenda Vertikal -->
                <div class="flex flex-col space-y-2 text-xs font-medium">
                    <div class="flex items-center">
                        <x-icon name="check-circle" class="w-4 h-4 text-green-500 mr-2" />
                        <span>Allowed Access</span>
                    </div>
                    <div class="flex items-center">
                        <x-icon name="x-circle" class="w-4 h-4 text-red-500 mr-2" />
                        <span>No Access</span>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 tracking-wider">
                            <th class="px-4 py-2 rounded-l-lg w-1/3">Module / Feature</th>
                            <th class="px-4 py-2 text-center w-1/6 bg-red-50 text-red-600">Owner</th>
                            <th class="px-4 py-2 text-center w-1/6 bg-blue-50 text-blue-600">Manager</th>
                            <th class="px-4 py-2 text-center w-1/6 bg-green-50 text-green-600">Finance</th>
                            <th class="px-4 py-2 text-center rounded-r-lg w-1/6 bg-purple-50 text-purple-600">Staff</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Dashboard</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Projects</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Orders</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Tasks</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Customers</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Finance</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Reports</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Expenses</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Users</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Roles & Permissions</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                        </tr>
                        <tr class="border-b border-gray-50">
                            <td class="px-4 py-2 font-medium">Staff</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-medium rounded-bl-lg">Log Activity</td>
                            <td class="px-4 py-2 text-center text-green-500 font-bold text-sm">✔</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm">✖</td>
                            <td class="px-4 py-2 text-center text-red-500 font-bold text-sm rounded-br-lg">✖</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= MODAL ADD ROLE ================= -->
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
                            <h3 class="text-xl font-bold text-gray-900">Add New Role</h3>
                            <p class="text-sm text-gray-500 mt-1">Create a new role and set module access permissions.</p>
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

                        <!-- SECTION 1: Role Information -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <x-icon name="document" class="w-5 h-5" />
                                <span class="font-bold text-sm">Role Information</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Role Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="role_name" maxlength="50"
                                        placeholder="e.g. Project Coordinator"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description
                                        (Optional)</label>
                                    <textarea name="description" rows="2" maxlength="200" placeholder="Enter role description..."
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                                    <div class="text-right text-[10px] text-gray-400 mt-1">0/200</div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Module Permissions -->
                        <div>
                            <div
                                class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                                <x-icon name="shield" class="w-5 h-5" />
                                <span class="font-bold text-sm">Module Permissions</span>
                            </div>
                            <p class="text-xs text-gray-500 mb-4">Set the access permissions for each module. Check the
                                actions that this role is allowed to perform.</p>

                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <table class="w-full text-left text-[13px]">
                                    <thead class="bg-gray-50 text-xs font-semibold text-gray-600 border-b border-gray-200">
                                        <tr>
                                            <th class="px-4 py-3">Module</th>
                                            <th class="px-4 py-3 text-center">Create</th>
                                            <th class="px-4 py-3 text-center">Read</th>
                                            <th class="px-4 py-3 text-center">Update</th>
                                            <th class="px-4 py-3 text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        <!-- Dashboard -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="layout-dashboard" class="w-4 h-4 text-purple-600" />
                                                    <span>Dashboard</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox" checked disabled
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                        </tr>
                                        <!-- Projects -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="folder" class="w-4 h-4 text-orange-500" />
                                                    <span>Projects</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Orders -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="cart" class="w-4 h-4 text-blue-500" />
                                                    <span>Orders</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Tasks -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="check-square" class="w-4 h-4 text-red-500" />
                                                    <span>Tasks</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Customers -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="users" class="w-4 h-4 text-teal-500" />
                                                    <span>Customers</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Finance -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="credit-card" class="w-4 h-4 text-green-500" />
                                                    <span>Finance</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Reports -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="chart-line" class="w-4 h-4 text-purple-500" />
                                                    <span>Reports</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                        </tr>
                                        <!-- Expenses -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="receipt" class="w-4 h-4 text-orange-400" />
                                                    <span>Expenses</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Users -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="user" class="w-4 h-4 text-blue-400" />
                                                    <span>Users</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Roles & Permissions -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="shield" class="w-4 h-4 text-indigo-500" />
                                                    <span>Roles & Permissions</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Staff -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="users" class="w-4 h-4 text-pink-500" />
                                                    <span>Staff</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                        </tr>
                                        <!-- Log Activity -->
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium">
                                                <div class="flex items-center gap-2">
                                                    <x-icon name="clock" class="w-4 h-4 text-gray-500" />
                                                    <span>Log Activity</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center"><input type="checkbox"
                                                    class="rounded border-gray-300 text-[#6D28D9]"></td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                            <td class="px-4 py-2 text-center text-gray-400">—</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Note diletakkan di luar border tabel -->
                            <p class="text-xs text-gray-500 mt-3">Some modules only support specific actions (e.g.
                                Dashboard, Reports, and Log Activity are read-only).</p>
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
                            Create Role
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
