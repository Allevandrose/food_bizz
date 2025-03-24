<x-side>
    {{-- resources/views/components/dashboard.blade.php --}}
    <div class="p-8 w-full">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="neumorphic p-6 rounded-2xl">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 text-sm">Total Orders</div>
                    <div class="neumorphic-inset p-3 rounded-full text-blue-500">
                        <i class="ri-shopping-cart-2-line text-xl"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-800">8,492</div>
                <div class="flex items-center mt-2 text-xs text-green-500">
                    <i class="ri-arrow-up-s-line mr-1"></i>
                    <span>+15.3% vs last month</span>
                </div>
            </div>
            <div class="neumorphic p-6 rounded-2xl">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 text-sm">Total Revenue</div>
                    <div class="neumorphic-inset p-3 rounded-full text-indigo-600">
                        <i class="ri-money-dollar-circle-line text-xl"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-800">$74,284</div>
                <div class="flex items-center mt-2 text-xs text-green-500">
                    <i class="ri-arrow-up-s-line mr-1"></i>
                    <span>+10.8% vs last month</span>
                </div>
            </div>
            <div class="neumorphic p-6 rounded-2xl">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 text-sm">Active Restaurants</div>
                    <div class="neumorphic-inset p-3 rounded-full text-orange-500">
                        <i class="ri-store-2-line text-xl"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-800">142</div>
                <div class="flex items-center mt-2 text-xs text-green-500">
                    <i class="ri-arrow-up-s-line mr-1"></i>
                    <span>+7.2% vs last month</span>
                </div>
            </div>
            <div class="neumorphic p-6 rounded-2xl">
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-600 text-sm">Active Users</div>
                    <div class="neumorphic-inset p-3 rounded-full text-purple-500">
                        <i class="ri-user-3-line text-xl"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold text-gray-800">9,274</div>
                <div class="flex items-center mt-2 text-xs text-green-500">
                    <i class="ri-arrow-up-s-line mr-1"></i>
                    <span>+22.5% vs last month</span>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="neumorphic p-6 rounded-2xl">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Revenue Overview</h3>
                <div class="h-64">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
            <div class="neumorphic p-6 rounded-2xl">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Order Statistics</h3>
                <div class="h-64">
                    <canvas id="orderChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="neumorphic p-6 rounded-2xl mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
                <a href="#" class="neumorphic-hover px-4 py-2 rounded-lg text-sm text-blue-500 flex items-center">
                    View All <i class="ri-arrow-right-s-line ml-1"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left text-gray-600 text-sm py-3">Order ID</th>
                            <th class="text-left text-gray-600 text-sm py-3">Customer</th>
                            <th class="text-left text-gray-600 text-sm py-3">Restaurant</th>
                            <th class="text-left text-gray-600 text-sm py-3">Amount</th>
                            <th class="text-left text-gray-600 text-sm py-3">Status</th>
                            <th class="text-left text-gray-600 text-sm py-3">Date</th>
                            <th class="text-left text-gray-600 text-sm py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-100 hover:bg-gray-50">
                            <td class="py-4">ORD-7239</td>
                            <td>Emma Johnson</td>
                            <td>Burger Palace</td>
                            <td>$38.50</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                    Delivered
                                </span>
                            </td>
                            <td>Mar 22, 2025</td>
                            <td>
                                <button class="neumorphic-btn p-2 rounded-lg">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-100 hover:bg-gray-50">
                            <td class="py-4">ORD-7238</td>
                            <td>Liam Wilson</td>
                            <td>Pizza Haven</td>
                            <td>$45.75</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                    Processing
                                </span>
                            </td>
                            <td>Mar 22, 2025</td>
                            <td>
                                <button class="neumorphic-btn p-2 rounded-lg">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-100 hover:bg-gray-50">
                            <td class="py-4">ORD-7237</td>
                            <td>Olivia Davis</td>
                            <td>Sushi World</td>
                            <td>$62.20</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </td>
                            <td>Mar 22, 2025</td>
                            <td>
                                <button class="neumorphic-btn p-2 rounded-lg">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-100 hover:bg-gray-50">
                            <td class="py-4">ORD-7236</td>
                            <td>Noah Smith</td>
                            <td>Taco Express</td>
                            <td>$28.99</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                    Delivered
                                </span>
                            </td>
                            <td>Mar 21, 2025</td>
                            <td>
                                <button class="neumorphic-btn p-2 rounded-lg">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-100 hover:bg-gray-50">
                            <td class="py-4">ORD-7235</td>
                            <td>Ava Johnson</td>
                            <td>Pasta Place</td>
                            <td>$52.40</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-800">
                                    Cancelled
                                </span>
                            </td>
                            <td>Mar 21, 2025</td>
                            <td>
                                <button class="neumorphic-btn p-2 rounded-lg">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Restaurants -->
        <div class="neumorphic p-6 rounded-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Top Restaurants</h3>
                <a href="#" class="neumorphic-hover px-4 py-2 rounded-lg text-sm text-blue-500 flex items-center">
                    View All <i class="ri-arrow-right-s-line ml-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="neumorphic-inset p-4 rounded-xl">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg mr-3"></div>
                        <div>
                            <div class="text-sm font-medium text-gray-800">Burger Palace</div>
                            <div class="text-xs text-gray-500">Fast Food</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-600">
                        <div>Orders: 1,324</div>
                        <div>Revenue: $28,450</div>
                        <div>Rating: 4.8</div>
                    </div>
                </div>
                <div class="neumorphic-inset p-4 rounded-xl">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg mr-3"></div>
                        <div>
                            <div class="text-sm font-medium text-gray-800">Pizza Haven</div>
                            <div class="text-xs text-gray-500">Italian</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-600">
                        <div>Orders: 1,142</div>
                        <div>Revenue: $25,680</div>
                        <div>Rating: 4.7</div>
                    </div>
                </div>
                <div class="neumorphic-inset p-4 rounded-xl">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg mr-3"></div>
                        <div>
                            <div class="text-sm font-medium text-gray-800">Sushi World</div>
                            <div class="text-xs text-gray-500">Japanese</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-600">
                        <div>Orders: 987</div>
                        <div>Revenue: $22,300</div>
                        <div>Rating: 4.9</div>
                    </div>
                </div>
                <div class="neumorphic-inset p-4 rounded-xl">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg mr-3"></div>
                        <div>
                            <div class="text-sm font-medium text-gray-800">Taco Express</div>
                            <div class="text-xs text-gray-500">Mexican</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-600">
                        <div>Orders: 865</div>
                        <div>Revenue: $19,750</div>
                        <div>Rating: 4.6</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN and Chart Initialization Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const gradient = revenueCtx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)');
            gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [15000, 21000, 18000, 24000, 23000, 28000, 32000, 35000, 37000, 34000, 40000, 42000],
                        borderColor: '#4f46e5',
                        backgroundColor: gradient,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#4f46e5',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#ffffff',
                            titleColor: '#334155',
                            bodyColor: '#334155',
                            borderColor: '#e2e8f0',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return `$ ${context.parsed.y.toLocaleString()}`;
                                }
                            }
                        }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#94a3b8' } },
                        y: {
                            beginAtZero: true,
                            grid: { borderDash: [4, 4], color: '#e2e8f0' },
                            ticks: {
                                color: '#94a3b8',
                                callback: function(value) { return '$' + value.toLocaleString(); }
                            }
                        }
                    }
                }
            });

            // Order Chart
            const orderCtx = document.getElementById('orderChart').getContext('2d');
            new Chart(orderCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Orders',
                        data: [420, 560, 480, 620, 650, 700, 780, 820, 880, 840, 900, 950],
                        backgroundColor: '#10b981',
                        borderRadius: 8,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#ffffff',
                            titleColor: '#334155',
                            bodyColor: '#334155',
                            borderColor: '#e2e8f0',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: false
                        }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#94a3b8' } },
                        y: {
                            beginAtZero: true,
                            grid: { borderDash: [4, 4], color: '#e2e8f0' },
                            ticks: { color: '#94a3b8' }
                        }
                    }
                }
            });
        });
    </script>

    <!-- Neumorphic Styles -->
    <style>
        .neumorphic {
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
        }

        .neumorphic-inset {
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
        }

        .neumorphic-hover:hover {
            box-shadow: 5px 5px 10px #d1d9e6, -5px -5px 10px #ffffff;
            transform: translateY(-2px);
        }

        .neumorphic-btn {
            box-shadow: 4px 4px 8px #d1d9e6, -4px -4px 8px #ffffff;
            transition: all 0.2s ease;
        }

        .neumorphic-btn:hover {
            box-shadow: 6px 6px 10px #d1d9e6, -6px -6px 10px #ffffff;
            transform: translateY(-2px);
        }
    </style>
</x-side>