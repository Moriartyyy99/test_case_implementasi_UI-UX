<div x-data="{ openModal: false }">
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Order Management</h1>
            <p class="text-gray-500 mt-1">Manage and track all customer orders in your company</p>
        </div>
        <!-- Tombol + New Order DIHAPUS untuk Finance -->
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">36</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 20% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">🛒</div>
        </div>
        
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">In Progress Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 33% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">🔄</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Completed Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">18</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 50% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">✅</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Cancelled Orders</p>
                <h3 class="text-2xl font-bold text-gray-900">6</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">❌</div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search order ID, client, or service..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <span class="absolute left-3 top-3 text-gray-400">🔍</span>
        </div>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
            <option>All Status</option>
            <option>In Progress</option>
            <option>Completed</option>
            <option>Cancelled</option>
        </select>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
            <option>All Type</option>
            <option>Mobile App</option>
            <option>Website</option>
            <option>Custom Software</option>
            <option>Maintenance</option>
        </select>
        <div class="relative w-40">
            <input type="text" placeholder="Select date range" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
            <span class="absolute right-3 top-3 text-gray-400">📅</span>
        </div>
        <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 w-36">
            <span class="mr-2">⚲</span> Clear Filter
        </button>
    </div>

    <!-- Tabel Orders -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="p-4">#</th>
                        <th class="p-4">Order ID</th>
                        <th class="p-4">Client</th>
                        <th class="p-4">Service</th>
                        <th class="p-4">Order Date</th>
                        <th class="p-4">Amount</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <!-- Baris 1 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">1</td>
                        <td class="p-4 font-medium text-gray-900">ORD-001</td>
                        <td class="p-4 text-gray-600">PT Maju Jaya</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Mobile App</span></td>
                        <td class="p-4 text-gray-500">01 Aug 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 50.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <!-- Tombol Delete DIHAPUS -->
                        </td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4 font-medium text-gray-900">ORD-002</td>
                        <td class="p-4 text-gray-600">Toko Berkah</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Website</span></td>
                        <td class="p-4 text-gray-500">15 Jul 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 75.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 3 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">3</td>
                        <td class="p-4 font-medium text-gray-900">ORD-003</td>
                        <td class="p-4 text-gray-600">PT Sinar Abadi</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Website</span></td>
                        <td class="p-4 text-gray-500">01 Sep 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 30.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium whitespace-nowrap">Completed</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4 font-medium text-gray-900">ORD-004</td>
                        <td class="p-4 text-gray-600">PT Cipta Solusi</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Custom Software</span></td>
                        <td class="p-4 text-gray-500">10 Aug 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 45.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4 font-medium text-gray-900">ORD-005</td>
                        <td class="p-4 text-gray-600">CV Maju Sentosa</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Mobile App</span></td>
                        <td class="p-4 text-gray-500">05 Sep 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 60.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4 font-medium text-gray-900">ORD-006</td>
                        <td class="p-4 text-gray-600">Yayasan Harapan</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Custom Software</span></td>
                        <td class="p-4 text-gray-500">12 Aug 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 15.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4 font-medium text-gray-900">ORD-007</td>
                        <td class="p-4 text-gray-600">PT Retail Indonesia</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Custom Software</span></td>
                        <td class="p-4 text-gray-500">20 Jul 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 20.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4 font-medium text-gray-900">ORD-008</td>
                        <td class="p-4 text-gray-600">PT Global Teknologi</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Maintenance</span></td>
                        <td class="p-4 text-gray-500">01 Oct 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 10.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium whitespace-nowrap">On Hold</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 9 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">9</td>
                        <td class="p-4 font-medium text-gray-900">ORD-009</td>
                        <td class="p-4 text-gray-600">PT Harapan Baru</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Website</span></td>
                        <td class="p-4 text-gray-500">15 Aug 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 20.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium whitespace-nowrap">Cancelled</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                    <!-- Baris 10 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">10</td>
                        <td class="p-4 font-medium text-gray-900">ORD-010</td>
                        <td class="p-4 text-gray-600">PT Sentosa</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Maintenance</span></td>
                        <td class="p-4 text-gray-500">02 Aug 2026</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">Rp 7.000.000</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium whitespace-nowrap">Completed</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
            <div>Showing 1-10 of 36 orders</div>
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
</div>