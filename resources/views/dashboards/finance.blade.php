<!-- Header Halaman -->
<div class="mb-6">
    <h1 class="text-4xl font-bold text-gray-900">Welcome Back, Finance!</h1>
    <p class="text-gray-500 mt-1">Overview of company financial performance and transactions.</p>
</div>

<!-- KPI Cards Finance -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Revenue</p>
            <h3 class="text-2xl font-bold text-gray-900">Rp 85.000.000</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 25% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">📈</div>
    </div>
    
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Expenses</p>
            <h3 class="text-2xl font-bold text-gray-900">Rp 28.500.000</h3>
            <p class="text-xs text-red-500 font-medium mt-2">↓ 12% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600 text-lg">📉</div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Net Profit</p>
            <h3 class="text-2xl font-bold text-gray-900">Rp 56.500.000</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 32% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600 text-lg">💵</div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Transactions</p>
            <h3 class="text-2xl font-bold text-gray-900">64</h3>
            <p class="text-xs text-green-500 font-medium mt-2">↑ 18% from last month</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 text-lg">📄</div>
    </div>
</div>

<!-- Area Grafik Finance -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Revenue & Expenses Chart -->
    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-start mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📊</div>
                <div>
                    <h3 class="font-bold text-gray-900">Revenue & Expenses</h3>
                    <p class="text-xs text-gray-500">Monthly financial performance</p>
                </div>
            </div>
            <!-- Dropdown & Legend Manual -->
            <div class="flex flex-col items-end space-y-2">
                <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                    <option>Last 6 Months</option>
                </select>
                <div class="flex items-center space-x-3 text-[11px] font-medium text-gray-600">
                    <div class="flex items-center"><span class="w-2.5 h-2.5 bg-[#6D28D9] rounded-full mr-1.5"></span> Revenue</div>
                    <div class="flex items-center"><span class="w-2.5 h-2.5 bg-[#E9D5FF] rounded-full mr-1.5"></span> Expenses</div>
                </div>
            </div>
        </div>
        <div class="relative w-full h-56">
            <canvas id="financeBarChart"></canvas>
        </div>
    </div>

    <!-- Expense Breakdown -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">🍩</div>
                <div>
                    <h3 class="font-bold text-gray-900">Expense Breakdown</h3>
                    <p class="text-xs text-gray-500">Total 28.500.000</p>
                </div>
            </div>
            <select class="text-xs border-gray-200 rounded-md text-gray-500 py-1 pl-2 pr-6 focus:ring-0">
                <option>This Month</option>
            </select>
        </div>
        
        <div class="flex items-center justify-between mt-2 flex-grow">
            <!-- Donat Chart -->
            <div class="relative w-32 h-32 flex-shrink-0">
                <canvas id="financeExpenseChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-sm font-bold text-gray-900">Rp 28.5 jt</span>
                    <span class="text-[10px] text-gray-500">Total Expenses</span>
                </div>
            </div>
            
            <!-- Legend Rapi (5 Item) -->
            <div class="flex flex-col space-y-3 text-[11px] w-full ml-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-28">
                        <span class="w-2.5 h-2.5 bg-[#6D28D9] rounded-full mr-2"></span> Operational
                    </div>
                    <span class="font-bold text-gray-900 w-20 text-right">Rp 12.000.000</span>
                    <span class="text-gray-400 w-10 text-right">32%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-28">
                        <span class="w-2.5 h-2.5 bg-red-500 rounded-full mr-2"></span> Salaries
                    </div>
                    <span class="font-bold text-gray-900 w-20 text-right">Rp 7.500.000</span>
                    <span class="text-gray-400 w-10 text-right">26%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-28">
                        <span class="w-2.5 h-2.5 bg-orange-400 rounded-full mr-2"></span> Software & Tools
                    </div>
                    <span class="font-bold text-gray-900 w-20 text-right">Rp 7.500.000</span>
                    <span class="text-gray-400 w-10 text-right">14%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-28">
                        <span class="w-2.5 h-2.5 bg-blue-500 rounded-full mr-2"></span> Utilities
                    </div>
                    <span class="font-bold text-gray-900 w-20 text-right">Rp 7.500.000</span>
                    <span class="text-gray-400 w-10 text-right">14%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center w-28">
                        <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span> Others
                    </div>
                    <span class="font-bold text-gray-900 w-20 text-right">Rp 7.500.000</span>
                    <span class="text-gray-400 w-10 text-right">14%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Transactions & Expenses -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Transactions -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">📋</div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm">Recent Transactions</h3>
                    <p class="text-xs text-gray-500">Latest financial transactions</p>
                </div>
            </div>
            <a href="{{ route('finance', ['role' => $role]) }}" class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                View All Transactions <span class="ml-1 text-lg">&rarr;</span>
            </a>
        </div>
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-left text-[13px] text-gray-600">
                <thead class="bg-gray-50 text-[11px] uppercase text-gray-500">
                    <tr>
                        <th class="px-3 py-3 rounded-l-lg">#</th>
                        <th class="px-3 py-3">Date</th>
                        <th class="px-3 py-3">ID</th>
                        <th class="px-3 py-3">Type</th>
                        <th class="px-3 py-3">Client</th>
                        <th class="px-3 py-3">Amount</th>
                        <th class="px-3 py-3 rounded-r-lg">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">1</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">01 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">TRX-001</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Maju Jaya</td>
                        <td class="px-3 py-3 text-green-600 font-medium whitespace-nowrap">+Rp 50.000.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">2</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">02 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">TRX-002</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-medium whitespace-nowrap">Expense</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Internal Operations</td>
                        <td class="px-3 py-3 text-red-600 font-medium whitespace-nowrap">-Rp 1.500.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">3</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">05 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">TRX-003</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Toko Berkah</td>
                        <td class="px-3 py-3 text-green-600 font-medium whitespace-nowrap">+Rp 75.000.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">4</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">10 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">TRX-004</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-medium whitespace-nowrap">Expense</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">Internal Operations</td>
                        <td class="px-3 py-3 text-red-600 font-medium whitespace-nowrap">-Rp 5.000.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Completed</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">5</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">12 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">TRX-005</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Income</span></td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">PT Cipta Solusi</td>
                        <td class="px-3 py-3 text-green-600 font-medium whitespace-nowrap">+Rp 45.000.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-[10px] font-medium whitespace-nowrap">In Progress</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Expenses -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">🧾</div>
                <div>
                    <h3 class="font-bold text-gray-900 text-sm">Recent Expenses</h3>
                    <p class="text-xs text-gray-500">Latest company expenses</p>
                </div>
            </div>
            <a href="{{ route('expenses', ['role' => $role]) }}" class="text-sm font-medium text-[#6D28D9] hover:underline flex items-center">
                View All Expenses <span class="ml-1 text-lg">&rarr;</span>
            </a>
        </div>
        <div class="overflow-x-auto flex-grow">
            <table class="w-full text-left text-[13px] text-gray-600">
                <thead class="bg-gray-50 text-[11px] uppercase text-gray-500">
                    <tr>
                        <th class="px-3 py-3 rounded-l-lg">#</th>
                        <th class="px-3 py-3">Date</th>
                        <th class="px-3 py-3">Name</th>
                        <th class="px-3 py-3">Category</th>
                        <th class="px-3 py-3">Amount</th>
                        <th class="px-3 py-3 rounded-r-lg">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">1</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">01 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">Office Rent</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-md text-[10px] font-medium whitespace-nowrap">Operational</span></td>
                        <td class="px-3 py-3 text-gray-900 whitespace-nowrap">Rp 5.000.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Paid</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">2</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">03 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">Staff Salaries</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-red-100 text-red-700 rounded-md text-[10px] font-medium whitespace-nowrap">Salaries</span></td>
                        <td class="px-3 py-3 text-gray-900 whitespace-nowrap">Rp 7.500.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Paid</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">3</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">05 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">Figma Subscription</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-md text-[10px] font-medium whitespace-nowrap">Software</span></td>
                        <td class="px-3 py-3 text-gray-900 whitespace-nowrap">Rp 350.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Paid</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">4</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">08 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">Google Workspace</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-orange-100 text-orange-700 rounded-md text-[10px] font-medium whitespace-nowrap">Software</span></td>
                        <td class="px-3 py-3 text-gray-900 whitespace-nowrap">Rp 750.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-medium whitespace-nowrap">Pending</span></td>
                    </tr>
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-3 py-3">5</td>
                        <td class="px-3 py-3 text-gray-500 whitespace-nowrap">10 Aug 2026</td>
                        <td class="px-3 py-3 font-medium text-gray-900">Electricity Bill</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-md text-[10px] font-medium whitespace-nowrap">Utilities</span></td>
                        <td class="px-3 py-3 text-gray-900 whitespace-nowrap">Rp 1.750.000</td>
                        <td class="px-3 py-3"><span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-medium whitespace-nowrap">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script Chart.js khusus Finance -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Grafik Revenue & Expenses (Bar Chart)
        const ctx = document.getElementById('financeBarChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [
                    { label: 'Revenue', data: [45, 52, 48, 65, 72, 85], backgroundColor: '#6D28D9', borderRadius: 4, barPercentage: 0.6 },
                    { label: 'Expenses', data: [20, 25, 18, 30, 28, 28.5], backgroundColor: '#E9D5FF', borderRadius: 4, barPercentage: 0.6 }
                ]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false, 
                plugins: { legend: { display: false } }, 
                scales: { 
                    y: { 
                        beginAtZero: true, 
                        border: { display: false }, 
                        grid: { color: '#F3F4F6' },
                        ticks: { callback: function(value) { return 'Rp ' + value + ' jt'; } }
                    }, 
                    x: { grid: { display: false } } 
                } 
            }
        });

        // 2. Grafik Expense Breakdown (Doughnut Chart)
        const expenseCtx = document.getElementById('financeExpenseChart').getContext('2d');
        new Chart(expenseCtx, {
            type: 'doughnut',
            data: {
                labels: ['Operational', 'Salaries', 'Software', 'Utilities', 'Others'],
                datasets: [{ data: [12000000, 7500000, 7500000, 7500000, 7500000], backgroundColor: ['#6D28D9', '#EF4444', '#F97316', '#3B82F6', '#22C55E'], borderWidth: 0, cutout: '65%' }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    });
</script>