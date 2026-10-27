@extends('layouts.app')

@section('title', 'Workspace / Projects')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Project Management</h1>
            <p class="text-gray-500 mt-1">Manage, monitor, and track all projects in your company</p>
        </div>
        <!-- Tombol ini akan kita atur muncul/tidaknya berdasarkan role -->
        @if (in_array($role, ['owner', 'manager']))
            <button
                class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-4 py-2 rounded-lg text-sm font-medium transition flex items-center">
                <span class="mr-2">+</span> New Project
            </button>
        @endif
    </div>

    <!-- Card Tabel -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-sm font-medium text-gray-500">
                    <th class="p-4">Project Name</th>
                    <th class="p-4">Client</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Deadline</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                <!-- Baris 1 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4 font-medium">Attendance Mobile App</td>
                    <td class="p-4">PT Maju Jaya</td>
                    <td class="p-4"><span
                            class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">In
                            Progress</span></td>
                    <td class="p-4">30 Nov 2026</td>
                    <td class="p-4 flex justify-center space-x-3 text-lg">
                        <button title="View">👁️</button>
                        <button title="Edit">✏️</button>
                        @if (in_array($role, ['owner', 'manager']))
                            <button title="Delete" class="text-red-500">🗑️</button>
                        @endif
                    </td>
                </tr>
                <!-- Baris 2 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4 font-medium">E-Commerce Website</td>
                    <td class="p-4">Toko Berkah</td>
                    <td class="p-4"><span
                            class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Completed</span>
                    </td>
                    <td class="p-4">15 Nov 2026</td>
                    <td class="p-4 flex justify-center space-x-3 text-lg">
                        <button title="View">👁️</button>
                        <button title="Edit">✏️</button>
                        @if(in_array($role, ['owner', 'manager']))
                        <button title="Delete" class="text-red-500">🗑️</button>
                        @endif
                    </td>
                </tr>
                <!-- Baris 3 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4 font-medium">Company Profile Website</td>
                    <td class="p-4">PT Sinar Abadi</td>
                    <td class="p-4"><span
                            class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">On
                            Hold</span></td>
                    <td class="p-4">10 Okt 2026</td>
                    <td class="p-4 flex justify-center space-x-3 text-lg">
                        <button title="View">👁️</button>
                        <button title="Edit">✏️</button>
                        @if(in_array($role, ['owner', 'manager']))
                        <button title="Delete" class="text-red-500">🗑️</button>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
