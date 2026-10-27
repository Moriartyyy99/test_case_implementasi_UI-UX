@extends('layouts.app')

@section('title', 'Dashboard / Overview')

@section('content')
        <!-- Header Halaman -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Welcome Back, {{ Auth::user()->name }}!</h1>
        <!-- Perhatikan baris di bawah ini, memanggil company_name dari database -->
        <p class="text-gray-500 mt-1">Here's what's happening at {{ Auth::user()->company_name ?? 'your company' }} today.</p>
    </div>

    <!-- KPI Cards (Dummy) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 20% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">📁</div>
        </div>
        
        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pending Tasks</p>
                <h3 class="text-2xl font-bold text-gray-900">28</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 12% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">📋</div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">36</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 18% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600">🛒</div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Revenue</p>
                <h3 class="text-2xl font-bold text-gray-900">Rp 85.000.000</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">💵</div>
        </div>
    </div>

    <!-- Area Grafik (Placeholder) -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-80 flex flex-col items-center justify-center text-gray-400">
        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
        <p>Grafik Revenue & Task Summary akan dirender di sini.</p>
    </div>
@endsection