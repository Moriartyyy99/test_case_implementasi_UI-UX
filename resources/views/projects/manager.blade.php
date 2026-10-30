<div x-data="{ openModal: false }">
    <!-- Header Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">Project Management</h1>
            <p class="text-gray-500 mt-1">Manage, monitor, and track all projects in your company</p>
        </div>
        <button @click="openModal = true"
            class="bg-[#6D28D9] hover:bg-[#5B21B6] text-white px-5 py-2.5 rounded-lg text-sm font-medium transition flex items-center shadow-sm">
            <x-icon name="plus" class="w-4 h-4 mr-2" />
            <span>New Project</span>
        </button>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">24</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 20% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
                <x-icon name="folder" class="w-5 h-5" />
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Active Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 33% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                <x-icon name="folder" class="w-5 h-5" />
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Completed Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">9</h3>
                <p class="text-xs text-green-500 font-medium mt-2">↑ 12% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600">
                <x-icon name="check-circle" class="w-5 h-5" />
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">On Hold Projects</p>
                <h3 class="text-2xl font-bold text-gray-900">3</h3>
                <p class="text-xs text-red-500 font-medium mt-2">↓ 25% from last month</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                <x-icon name="pause-circle" class="w-5 h-5" />
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <div class="relative flex-grow">
            <input type="text" placeholder="Search project name, client, or team..."
                class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-purple-500">
            <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                <x-icon name="search" class="w-4 h-4" />
            </div>
        </div>
        <select
            class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
            <option>All Status</option>
            <option>In Progress</option>
            <option>Completed</option>
            <option>On Hold</option>
        </select>
        <select
            class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
            <option>All Types</option>
            <option>Mobile App</option>
            <option>Website</option>
            <option>Custom Software</option>
            <option>Maintenance</option>
        </select>
        <select
            class="bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:ring-2 focus:ring-purple-500 w-40">
            <option>All Clients</option>
            <option>PT Maju Jaya</option>
            <option>Toko Berkah</option>
        </select>
        <button
            class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 w-36">
            <x-icon name="filter" class="w-4 h-4 mr-2" />
            <span>Clear Filter</span>
        </button>
    </div>

    <!-- Tabel Projects -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
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
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Mobile
                                App</span></td>
                        <td class="p-4 text-gray-500">01 Aug 2026</td>
                        <td class="p-4 text-gray-500">30 Nov 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 65%"></div>
                                </div>
                                <span class="text-xs font-bold">65%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=1" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=2" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +2</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 2 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">2</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">E-Commerce Website</p>
                            <p class="text-xs text-gray-500">Online store with payment integration</p>
                        </td>
                        <td class="p-4 text-gray-600">Toko Berkah</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Website</span>
                        </td>
                        <td class="p-4 text-gray-500">15 Jul 2026</td>
                        <td class="p-4 text-gray-500">15 Nov 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 85%"></div>
                                </div>
                                <span class="text-xs font-bold">85%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=3" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=4" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=5" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +3</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
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
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium">Website</span>
                        </td>
                        <td class="p-4 text-gray-500">01 Sep 2026</td>
                        <td class="p-4 text-gray-500">10 Okt 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 100%"></div>
                                </div>
                                <span class="text-xs font-bold">100%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium whitespace-nowrap">Completed</span>
                        </td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=6" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=7" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +1</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 4 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">4</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">HRIS Web Application</p>
                            <p class="text-xs text-gray-500">Human resource management system</p>
                        </td>
                        <td class="p-4 text-gray-600">PT Cipta Solusi</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-md text-xs font-medium">Custom
                                Software</span></td>
                        <td class="p-4 text-gray-500">10 Aug 2026</td>
                        <td class="p-4 text-gray-500">20 Dec 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 20%"></div>
                                </div>
                                <span class="text-xs font-bold">20%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=8" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=9" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +4</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 5 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">5</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">Inventory Management App</p>
                            <p class="text-xs text-gray-500">Stock management mobile app</p>
                        </td>
                        <td class="p-4 text-gray-600">CV Maju Sentosa</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-md text-xs font-medium">Mobile
                                App</span></td>
                        <td class="p-4 text-gray-500">05 Sep 2026</td>
                        <td class="p-4 text-gray-500">15 Nov 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 40%"></div>
                                </div>
                                <span class="text-xs font-bold">40%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=10" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=11" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +2</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 6 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">6</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">School Management System</p>
                            <p class="text-xs text-gray-500">Web-based school management</p>
                        </td>
                        <td class="p-4 text-gray-600">Yayasan Harapan</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-md text-xs font-medium">Custom
                                Software</span></td>
                        <td class="p-4 text-gray-500">12 Aug 2026</td>
                        <td class="p-4 text-gray-500">30 Nov 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 55%"></div>
                                </div>
                                <span class="text-xs font-bold">55%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=12" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=13" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +3</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 7 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">7</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">POS Retail System</p>
                            <p class="text-xs text-gray-500">Point of sales for retail business</p>
                        </td>
                        <td class="p-4 text-gray-600">PT Retail Indonesia</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-orange-100 text-orange-700 rounded-md text-xs font-medium">Custom
                                Software</span></td>
                        <td class="p-4 text-gray-500">20 Jul 2026</td>
                        <td class="p-4 text-gray-500">25 Oct 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 90%"></div>
                                </div>
                                <span class="text-xs font-bold">90%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium whitespace-nowrap">In
                                Progress</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=14" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=15" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +1</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
                                    class="text-red-500 hover:text-red-700 transition">
                                    <x-icon name="trash" class="w-4 h-4" />
                                </button>

                            </div>
                        </td>
                    </tr>
                    <!-- Baris 8 -->
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="p-4">8</td>
                        <td class="p-4">
                            <p class="font-bold text-gray-900">Maintenance Website</p>
                            <p class="text-xs text-gray-500">Monthly maintenance and support</p>
                        </td>
                        <td class="p-4 text-gray-600">PT Global Teknologi</td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-green-100 text-green-700 rounded-md text-xs font-medium">Maintenance</span>
                        </td>
                        <td class="p-4 text-gray-500">01 Oct 2026</td>
                        <td class="p-4 text-gray-500">10 Dec 2026</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-[#6D28D9] h-1.5 rounded-full" style="width: 10%"></div>
                                </div>
                                <span class="text-xs font-bold">10%</span>
                            </div>
                        </td>
                        <td class="p-4"><span
                                class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium whitespace-nowrap">On
                                Hold</span></td>
                        <td class="p-4">
                            <div class="flex -space-x-2">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=16" alt="">
                                <img class="w-7 h-7 rounded-full border-2 border-white"
                                    src="https://i.pravatar.cc/100?img=17" alt="">
                                <div
                                    class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs text-gray-600 font-bold">
                                    +1</div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-3">

                                <button type="button" title="View Project"
                                    class="text-blue-500 hover:text-blue-700 transition">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Edit Project"
                                    class="text-amber-500 hover:text-amber-700 transition">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </button>

                                <button type="button" title="Delete Project"
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
            <div>Showing 1-8 of 24 projects</div>
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
                    <option>8 / page</option>
                </select>
            </div>
        </div>
    </div>

    <!-- ================= MODAL NEW PROJECT ================= -->
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
                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl flex flex-col max-h-[90vh]">

                <!-- Header Modal -->
                <div class="bg-white px-8 pt-6 pb-2 flex justify-between items-start flex-shrink-0">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Create New Project</h3>
                        <p class="text-sm text-gray-500 mt-1">Fill in the project details to create a new project.</p>
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

                    <!-- SECTION 1: Project Information -->
                    <div>
                        <div
                            class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <x-icon name="folder" class="w-5 h-5" />
                            <span class="font-bold text-sm">Project Information</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" placeholder="Enter project name..."
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Type / Service
                                    <span class="text-red-500">*</span></label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Select service type</option>
                                    <option>Mobile App</option>
                                    <option>Website</option>
                                    <option>Custom Software</option>
                                    <option>Maintenance</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                            <div>
                                <div class="flex justify-between items-end mb-1">
                                    <label class="block text-sm font-medium text-gray-700">Client / Company <span
                                            class="text-red-500">*</span></label>
                                </div>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-500">
                                    <option value="">Select client</option>
                                    <option>PT Maju Jaya</option>
                                    <option>Toko Berkah</option>
                                    <option>PT Sinar Abadi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Budget <span
                                        class="text-red-500">*</span></label>
                                <div
                                    class="flex rounded-lg border border-gray-300 focus-within:ring-[#6D28D9] focus-within:border-[#6D28D9] overflow-hidden">
                                    <span
                                        class="bg-gray-50 text-gray-500 px-4 py-2.5 text-sm border-r border-gray-300 font-medium">Rp</span>
                                    <input type="number" placeholder="Enter project budget"
                                        class="w-full px-4 py-2.5 text-sm focus:outline-none">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Start Date <span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">End Date <span
                                        class="text-red-500">*</span></label>
                                <input type="date"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-500 focus:ring-[#6D28D9] focus:border-[#6D28D9]">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Project Description</label>
                            <textarea rows="2" placeholder="Enter project description..."
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9]"></textarea>
                            <div class="text-right text-xs text-gray-400 mt-1">0/500</div>
                        </div>
                    </div>

                    <!-- SECTION 2: Additional Settings -->
                    <div>
                        <div
                            class="flex items-center space-x-2 bg-purple-50 text-[#6D28D9] px-4 py-2.5 rounded-lg mb-5">
                            <x-icon name="settings" class="w-5 h-5" />
                            <span class="font-bold text-sm">Additional Settings</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                            <div class="md:col-span-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-[#6D28D9] focus:border-[#6D28D9] text-gray-700">
                                    <option>To Do</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </div>

                            <div class="md:col-span-8">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Team <span
                                        class="text-red-500">*</span></label>
                                <div
                                    class="relative border border-gray-300 rounded-lg px-3 py-2 bg-white text-sm flex flex-wrap gap-2 items-center min-h-[46px] cursor-pointer hover:border-gray-400 transition">
                                    <span
                                        class="bg-purple-100 text-purple-700 px-2.5 py-1 rounded-md text-xs font-medium flex items-center">
                                        Andi Rahman <span
                                            class="ml-1.5 cursor-pointer hover:text-purple-900 text-sm">&times;</span>
                                    </span>
                                    <span
                                        class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-md text-xs font-medium flex items-center">
                                        Budi Santoso <span
                                            class="ml-1.5 cursor-pointer hover:text-blue-900 text-sm">&times;</span>
                                    </span>

                                    <input type="text" placeholder="Add member..."
                                        class="flex-grow bg-transparent border-none p-0 text-sm focus:ring-0 focus:outline-none min-w-[100px]">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer Modal -->
                <div
                    class="bg-gray-50 px-8 py-4 flex justify-end space-x-3 rounded-b-2xl border-t border-gray-200 flex-shrink-0">
                    <button @click="openModal = false" type="button"
                        class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-2 focus:ring-gray-200">
                        Cancel
                    </button>
                    <button type="button"
                        class="px-6 py-2.5 text-sm font-medium text-white bg-[#6D28D9] rounded-lg hover:bg-[#5B21B6] focus:ring-2 focus:ring-purple-500">
                        Create Project
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
