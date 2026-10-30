<div x-data="{ openModal: false }">
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Task Management</h1>
            <p class="text-gray-500 mt-1">View and manage the tasks assigned to you.</p>
        </div>
        <button @click="openModal = true" class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
            <span class="mr-2 text-lg leading-none">+</span> New Task
        </button>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">My Tasks</p>
                <h3 class="text-2xl font-bold text-gray-900">8</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 14% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">📋</div>
        </div>
        
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">To Do</p>
                <h3 class="text-2xl font-bold text-gray-900">1</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 50% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-600 text-lg">📝</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">In Progress</p>
                <h3 class="text-2xl font-bold text-gray-900">5</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">🔄</div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Completed</p>
                <h3 class="text-2xl font-bold text-gray-900">2</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 100% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">✅</div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col xl:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search task name, project, or client..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <span class="absolute left-3 top-3 text-gray-400">🔍</span>
        </div>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Status</option>
            <option>To Do</option>
            <option>In Progress</option>
            <option>Completed</option>
        </select>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Projects</option>
            <option>Attendance Mobile App</option>
            <option>HRIS Web Application</option>
        </select>
        <select class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 xl:w-40">
            <option>All Priority</option>
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
        </select>
        <div class="relative xl:w-48">
            <input type="text" placeholder="Select date range" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-500 focus:ring-2 focus:ring-purple-500">
            <span class="absolute right-3 top-3 text-gray-400">📅</span>
        </div>
        <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 xl:w-36">
            <span class="mr-2">⚲</span> Clear Filter
        </button>
    </div>

    <!-- Tabel Tasks -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="p-4">#</th>
                        <th class="p-4">Task Name</th>
                        <th class="p-4">Project</th>
                        <th class="p-4">Priority</th>
                        <th class="p-4">Deadline</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <!-- Baris 1 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">1</td>
                        <td class="p-4 font-medium text-gray-900">Design Login UI</td>
                        <td class="p-4 text-gray-600">Attendance Mobile App</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">High</span></td>
                        <td class="p-4 text-gray-500">30 Nov 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4 font-medium text-gray-900">API Integration</td>
                        <td class="p-4 text-gray-600">HRIS Web Application</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">High</span></td>
                        <td class="p-4 text-gray-500">15 Nov 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 3 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">3</td>
                        <td class="p-4 font-medium text-gray-900">Database Setup</td>
                        <td class="p-4 text-gray-600">Attendance Mobile App</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Medium</span></td>
                        <td class="p-4 text-gray-500">10 Okt 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium whitespace-nowrap">To Do</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4 font-medium text-gray-900">UI/UX Revision</td>
                        <td class="p-4 text-gray-600">Company Profile Mobile</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Medium</span></td>
                        <td class="p-4 text-gray-500">20 Dec 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4 font-medium text-gray-900">Testing & Bug Fix</td>
                        <td class="p-4 text-gray-600">Attendance Mobile App</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Low</span></td>
                        <td class="p-4 text-gray-500">15 Nov 2025</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium whitespace-nowrap">To Do</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4 font-medium text-gray-900">Content Management</td>
                        <td class="p-4 text-gray-600">Company Profile Mobile</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium">Medium</span></td>
                        <td class="p-4 text-gray-500">30 Nov 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium whitespace-nowrap">Completed</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4 font-medium text-gray-900">Deployment</td>
                        <td class="p-4 text-gray-600">Attendance Mobile App</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Low</span></td>
                        <td class="p-4 text-gray-500">25 Oct 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium whitespace-nowrap">In Progress</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4 font-medium text-gray-900">User Acceptance Test</td>
                        <td class="p-4 text-gray-600">HRIS Web Application</td>
                        <td class="p-4"><span class="inline-flex justify-center items-center w-20 px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium">High</span></td>
                        <td class="p-4 text-gray-500">10 Dec 2026</td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium whitespace-nowrap">Completed</span></td>
                        <td class="p-4 flex justify-center space-x-2 text-lg">
                            <button class="text-gray-400 hover:text-blue-500">👁️</button>
                            <button class="text-gray-400 hover:text-orange-500">✏️</button>
                            <button class="text-gray-400 hover:text-red-500">🗑️</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
            <div>Showing 1-8 of 8 tasks</div>
            <div class="flex items-center space-x-2">
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&lt;</button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#6D28D9] text-white rounded-lg font-medium">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg hover:bg-gray-50">&gt;</button>
                <select class="ml-2 border-gray-200 rounded-lg text-sm py-1 pl-2 pr-6">
                    <option>8 / page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- ================= MODAL NEW TASK ================= -->
    <div x-show="openModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        
        <!-- Overlay Hitam -->
        <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="openModal = false"></div>

        <!-- Kotak Modal -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl flex flex-col max-h-[90vh]">
                
                <!-- Header Modal -->
                <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start flex-shrink-0">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Create New Task</h3>
                        <p class="text-sm text-gray-500 mt-1">Fill in the task details to create a new task.</p>
                    </div>
                    <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 mt-1">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <!-- Body Modal (Form) -->
                <div class="bg-white px-8 py-4 space-y-6 overflow-y-auto flex-grow">
                    
                    <!-- SECTION 1: Task Information -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <span class="text-lg">📄</span>
                            <span class="font-bold text-sm">Task Information</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Task Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Enter task name..." class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project <span class="text-red-500">*</span></label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Select project</option>
                                    <option>Attendance Mobile App</option>
                                    <option>E-Commerce Website</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Task Description (Optional)</label>
                            <textarea rows="3" placeholder="Enter task description..." class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                            <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                        </div>
                    </div>

                    <!-- SECTION 2: Assignment -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <span class="text-lg">👥</span>
                            <span class="font-bold text-sm">Assignment</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Assignee <span class="text-red-500">*</span></label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Select team member</option>
                                    <option>Andi Rahman</option>
                                    <option>Siti Nurhaliza</option>
                                </select>
                                <p class="text-[11px] text-gray-400 mt-1">Assign this task to a team member who is responsible for completing it.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Priority <span class="text-red-500">*</span></label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option selected>High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Deadline -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <span class="text-lg">📅</span>
                            <span class="font-bold text-sm">Deadline</span>
                        </div>

                        <div class="w-full md:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deadline <span class="text-red-500">*</span></label>
                            <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            <p class="text-[11px] text-gray-400 mt-1">The date when this task should be completed.</p>
                        </div>
                    </div>

                    <!-- SECTION 4: Status -->
                    <div>
                        <div class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <span class="text-lg">⚙️</span>
                            <span class="font-bold text-sm">Status</span>
                        </div>

                        <div class="w-full md:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                <option>To Do</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                            </select>
                            <p class="text-[11px] text-gray-400 mt-1">Set the current status of this task.</p>
                        </div>
                    </div>

                </div>

                <!-- Footer Modal (Tombol Aksi) -->
                <div class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200 flex-shrink-0">
                    <button @click="openModal = false" type="button" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                        Cancel
                    </button>
                    <button type="button" class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                        Create Task
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>