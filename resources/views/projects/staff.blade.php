<!-- Header Halaman -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-4xl font-bold text-gray-900">Project Management</h1>
        <p class="text-gray-500 mt-1">View and manage the projects you are assigned to.</p>
    </div>
    <!-- Tombol + New Project TIDAK ADA untuk Staff -->
</div>

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Projects</p>
            <h3 class="text-2xl font-bold text-gray-900">3</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 50% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">📁</div>
    </div>
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Active Projects</p>
            <h3 class="text-2xl font-bold text-gray-900">2</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 33% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">📂</div>
    </div>
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Completed Projects</p>
            <h3 class="text-2xl font-bold text-gray-900">1</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 100% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">✅</div>
    </div>
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">On Hold Projects</p>
            <h3 class="text-2xl font-bold text-gray-900">0</h3>
            <p class="text-xs text-red-500 font-medium mt-2">↓ 0% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">⏸️</div>
    </div>
</div>

<!-- Filter & Search -->
<div class="flex flex-col md:flex-row gap-3 mb-6">
    <div class="relative flex-grow">
        <input type="text" placeholder="Search project name, client, or team..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
        <span class="absolute left-3 top-3 text-gray-400">🔍</span>
    </div>
    <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
        <option>All Status</option>
        <option>In Progress</option>
        <option>Completed</option>
    </select>
    <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
        <option>All Types</option>
        <option>Mobile App</option>
        <option>Website</option>
    </select>
    <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 w-36">
        <span class="mr-2">⚲</span> Clear Filter
    </button>
</div>

<!-- Tabel Projects -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="p-4">#</th>
                    <th class="p-4">Project Name</th>
                    <th class="p-4">Client</th>
                    <th class="p-4">Project Type</th>
                    <th class="p-4">Start Date</th>
                    <th class="p-4">Deadline</th>
                    <th class="p-4">Progress</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Team</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                <!-- Baris 1 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4">1</td>
                    <td class="p-4">
                        <p class="font-bold text-gray-900">Attendance Mobile App</p>
                        <p class="text-xs text-gray-500">Mobile application for employee attendance</p>
                    </td>
                    <td class="p-4 text-gray-600">PT Maju Jaya</td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Mobile App</span></td>
                    <td class="p-4 text-gray-500">01 Aug 2026</td>
                    <td class="p-4 text-gray-500">30 Nov 2026</td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-16 bg-gray-200 rounded-full h-1.5"><div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 65%"></div></div>
                            <span class="text-xs font-bold">65%</span>
                        </div>
                    </td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                    <td class="p-4">
                        <div class="flex -space-x-2">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="">
                            <div class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">+2</div>
                        </div>
                    </td>
                    <td class="p-4 flex justify-center space-x-2 text-lg">
                        <button class="text-gray-400 hover:text-blue-500">👁️</button>
                        <button class="text-gray-400 hover:text-orange-500">✏️</button>
                        <!-- Tombol Delete DIHAPUS -->
                    </td>
                </tr>
                <!-- Baris 2 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4">2</td>
                    <td class="p-4">
                        <p class="font-bold text-gray-900">HRIS Web Application</p>
                        <p class="text-xs text-gray-500">Human resource management system</p>
                    </td>
                    <td class="p-4 text-gray-600">PT Cipta Solusi</td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">Custom Software</span></td>
                    <td class="p-4 text-gray-500">10 Aug 2026</td>
                    <td class="p-4 text-gray-500">20 Dec 2026</td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-16 bg-gray-200 rounded-full h-1.5"><div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 20%"></div></div>
                            <span class="text-xs font-bold">20%</span>
                        </div>
                    </td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                    <td class="p-4">
                        <div class="flex -space-x-2">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=4" alt="">
                            <div class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">+4</div>
                        </div>
                    </td>
                    <td class="p-4 flex justify-center space-x-2 text-lg">
                        <button class="text-gray-400 hover:text-blue-500">👁️</button>
                        <button class="text-gray-400 hover:text-orange-500">✏️</button>
                    </td>
                </tr>
                <!-- Baris 3 -->
                <tr class="border-b border-gray-50 hover:bg-gray-50">
                    <td class="p-4">3</td>
                    <td class="p-4">
                        <p class="font-bold text-gray-900">Company Profile Website</p>
                        <p class="text-xs text-gray-500">Company profile and landing page</p>
                    </td>
                    <td class="p-4 text-gray-600">PT Sinar Abadi</td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Website</span></td>
                    <td class="p-4 text-gray-500">01 Sep 2026</td>
                    <td class="p-4 text-gray-500">10 Okt 2026</td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-16 bg-gray-200 rounded-full h-1.5"><div class="bg-green-500 h-1.5 rounded-full" style="width: 100%"></div></div>
                            <span class="text-xs font-bold">100%</span>
                        </div>
                    </td>
                    <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium whitespace-nowrap">Completed</span></td>
                    <td class="p-4">
                        <div class="flex -space-x-2">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=5" alt="">
                            <img class="w-7 h-7 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=6" alt="">
                            <div class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">+1</div>
                        </div>
                    </td>
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
        <div>Showing 1-3 of 3 projects</div>
        <div class="flex items-center space-x-2">
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
            <button class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
        </div>
    </div>
</div>