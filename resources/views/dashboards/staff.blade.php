<!-- Header Halaman -->
<div class="mb-6">
    <h1 class="text-4xl font-bold text-gray-900">Welcome Back, Staff!</h1>
    <p class="text-gray-500 mt-1">Here's your project progress and assigned tasks.</p>
</div>

<!-- KPI Cards Staff -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">My Projects</p>
            <h3 class="text-2xl font-bold text-gray-900">3</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 50% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center text-yellow-600 text-lg">📁</div>
    </div>
    
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">My Tasks</p>
            <h3 class="text-2xl font-bold text-gray-900">8</h3>
            <p class="text-xs text-red-500 font-medium mt-2">↓ 14% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-teal-100 flex items-center justify-center text-teal-600 text-lg">📋</div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">In Progress Tasks</p>
            <h3 class="text-2xl font-bold text-gray-900">5</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-pink-100 flex items-center justify-center text-pink-600 text-lg">🔄</div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Completed Tasks</p>
            <h3 class="text-2xl font-bold text-gray-900">2</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 100% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">✅</div>
    </div>
</div>

<!-- Area Grafik Staff -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- My Projects Overview -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📁</div>
                <div>
                    <h3 class="font-bold text-gray-900">My Projects Overview</h3>
                    <p class="text-xs text-gray-500">Total 3 Projects</p>
                </div>
            </div>
            <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                <option>This Month</option>
            </select>
        </div>
        
        <div class="flex items-center mt-2 flex-grow">
            <!-- Donut Chart -->
            <div class="relative w-36 h-36 flex-shrink-0">
                <canvas id="staffProjectChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-3xl font-bold text-gray-900">3</span>
                    <span class="text-xs text-gray-500">Projects</span>
                </div>
            </div>
            
            <!-- Legend Rapi -->
            <div class="flex flex-col space-y-4 text-xs w-full ml-8">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-[#6D28D9] rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">In Progress</span>
                    <span class="font-bold text-gray-900 w-8 text-right">2</span>
                    <span class="text-gray-400 w-10 text-right">67%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">Completed</span>
                    <span class="font-bold text-gray-900 w-8 text-right">1</span>
                    <span class="text-gray-400 w-10 text-right">33%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-orange-400 rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">On Hold</span>
                    <span class="font-bold text-gray-900 w-8 text-right">0</span>
                    <span class="text-gray-400 w-10 text-right">0%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- My Task Summary -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📋</div>
                <div>
                    <h3 class="font-bold text-gray-900">My Task Summary</h3>
                    <p class="text-xs text-gray-500">Total 8 Tasks</p>
                </div>
            </div>
            <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                <option>This Month</option>
            </select>
        </div>
        
        <div class="flex items-center mt-2 flex-grow">
            <!-- Donut Chart -->
            <div class="relative w-36 h-36 flex-shrink-0">
                <canvas id="staffTaskChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-3xl font-bold text-gray-900">8</span>
                    <span class="text-xs text-gray-500">Tasks</span>
                </div>
            </div>
            
            <!-- Legend Rapi -->
            <div class="flex flex-col space-y-4 text-xs w-full ml-8">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">Completed</span>
                    <span class="font-bold text-gray-900 w-8 text-right">2</span>
                    <span class="text-gray-400 w-10 text-right">25%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-[#6D28D9] rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">In Progress</span>
                    <span class="font-bold text-gray-900 w-8 text-right">5</span>
                    <span class="text-gray-400 w-10 text-right">63%</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-orange-400 rounded-full mr-3"></span>
                    <span class="text-gray-600 w-24">To Do</span>
                    <span class="font-bold text-gray-900 w-8 text-right">1</span>
                    <span class="text-gray-400 w-10 text-right">12%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Projects & My Recent Task -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Projects -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📁</div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm">Recent Projects</h3>
                    <p class="text-xs text-gray-500">Latest project updates</p>
                </div>
            </div>
            <a href="{{ route('projects', ['role' => $role]) }}" class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                View All Projects <span class="ml-1 text-lg">&rarr;</span>
            </a>
        </div>
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-left text-[13px] text-gray-600">
                <thead class="bg-gray-50 text-[11px] uppercase text-gray-500">
                    <tr>
                        <th class="px-3 py-3 rounded-l-lg">#</th>
                        <th class="px-3 py-3">Project Name</th>
                        <th class="px-3 py-3">Client</th>
                        <th class="px-3 py-3">Progress</th>
                        <th class="px-3 py-3">Status</th>
                        <th class="px-3 py-3 rounded-r-lg">Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">1</td>
                        <td class="px-3 py-3">
                            <p class="font-medium text-gray-900">Attendance Mobile App</p>
                            <p class="text-[11px] text-gray-500">Mobile application for employee</p>
                        </td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Maju Jaya</td>
                        <td class="px-3 py-3">
                            <div class="flex items-center space-x-1">
                                <div class="w-12 bg-gray-200 rounded-full h-1.5"><div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 65%"></div></div>
                                <span class="text-[10px] font-bold">65%</span>
                            </div>
                        </td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">30 Nov 2026</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">2</td>
                        <td class="px-3 py-3">
                            <p class="font-medium text-gray-900">HRIS Web Application</p>
                            <p class="text-[11px] text-gray-500">Human resource management</p>
                        </td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Cipta Solusi</td>
                        <td class="px-3 py-3">
                            <div class="flex items-center space-x-1">
                                <div class="w-12 bg-gray-200 rounded-full h-1.5"><div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 20%"></div></div>
                                <span class="text-[10px] font-bold">20%</span>
                            </div>
                        </td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">20 Dec 2026</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">3</td>
                        <td class="px-3 py-3">
                            <p class="font-medium text-gray-900">Company Profile Website</p>
                            <p class="text-[11px] text-gray-500">Company profile and landing page</p>
                        </td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Sinar Abadi</td>
                        <td class="px-3 py-3">
                            <div class="flex items-center space-x-1">
                                <div class="w-12 bg-gray-200 rounded-full h-1.5"><div class="bg-green-500 h-1.5 rounded-full" style="width: 100%"></div></div>
                                <span class="text-[10px] font-bold">100%</span>
                            </div>
                        </td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">10 Okt 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- My Recent Task -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📋</div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm">My Recent Task</h3>
                    <p class="text-xs text-gray-500">Latest tasks assigned to you</p>
                </div>
            </div>
            <a href="{{ route('tasks', ['role' => $role]) }}" class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                View All Tasks <span class="ml-1 text-lg">&rarr;</span>
            </a>
        </div>
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-left text-[13px] text-gray-600">
                <thead class="bg-gray-50 text-[11px] uppercase text-gray-500">
                    <tr>
                        <th class="px-3 py-3 rounded-l-lg">#</th>
                        <th class="px-3 py-3">Task Name</th>
                        <th class="px-3 py-3">Project</th>
                        <th class="px-3 py-3">Priority</th>
                        <th class="px-3 py-3">Status</th>
                        <th class="px-3 py-3 rounded-r-lg">Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">1</td>
                        <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Design Login UI</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Attendance Mobile App</td>
                        <td class="px-3 py-3"><span class="inline-flex justify-center items-center w-16 px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-medium">High</span></td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">30 Nov 2026</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">2</td>
                        <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">API Integration</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">HRIS Web Application</td>
                        <td class="px-3 py-3"><span class="inline-flex justify-center items-center w-16 px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-medium">High</span></td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">15 Nov 2026</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">3</td>
                        <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Database Setup</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Attendance Mobile App</td>
                        <td class="px-3 py-3"><span class="inline-flex justify-center items-center w-16 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-md text-[10px] font-medium">Medium</span></td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-[10px] font-medium whitespace-nowrap">To Do</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">15 Nov 2025</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">4</td>
                        <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">UI/UX Revision</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Company Profile Website</td>
                        <td class="px-3 py-3"><span class="inline-flex justify-center items-center w-16 px-2 py-1 bg-yellow-100 text-yellow-700 rounded-md text-[10px] font-medium">Medium</span></td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">10 Dec 2026</td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">5</td>
                        <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Testing & Bug Fix</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Attendance Mobile App</td>
                        <td class="px-3 py-3"><span class="inline-flex justify-center items-center w-16 px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-[10px] font-medium">Low</span></td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-[10px] font-medium whitespace-nowrap">To Do</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">30 Sep 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script Chart.js untuk Staff -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Grafik Projects (Donut)
        const projCtx = document.getElementById('staffProjectChart').getContext('2d');
        new Chart(projCtx, {
            type: 'doughnut',
            data: {
                labels: ['In Progress', 'Completed', 'On Hold'],
                datasets: [{ data: [2, 1, 0], backgroundColor: ['#6D28D9', '#22C55E', '#FB923C'], borderWidth: 0, cutout: '65%' }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });

        // 2. Grafik Tasks (Donut)
        const taskCtx = document.getElementById('staffTaskChart').getContext('2d');
        new Chart(taskCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'To Do'],
                datasets: [{ data: [2, 5, 1], backgroundColor: ['#22C55E', '#6D28D9', '#FB923C'], borderWidth: 0, cutout: '65%' }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    });
</script>