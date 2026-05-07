<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glass Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-200 via-blue-100 to-white min-h-screen">
    <div id="app-wrapper" class="w-full min-h-screen relative"><!-- Animated background orbs -->
        <div class="relative" style="z-index:1"><!-- Navigation -->
            <nav class="fixed w-full z-50 backdrop-blur-lg bg-blue-500 border-b border-white/20 shadow-lg">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-between items-center h-16">
                    <!-- LOGO -->
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center justify-center overflow-hidden">
                            <img src="logo.png" 
                                class="h-8 sm:h-9 md:h-10 lg:h-11 w-auto object-contain transition duration-300 hover:scale-105">
                        </div>
                        <span class="font-bold text-white text-sm sm:text-base md:text-lg">
                            Weather Monitoring System
                        </span>
                    </div>

                    <!-- MENU DESKTOP -->
                    <div class="hidden md:flex items-center space-x-8">

                        <a href="#" class="relative group text-white font-medium hover:text-red-100 transition duration-300">
                        Home
                        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-200 transition-all duration-300 group-hover:w-full"></span>
                        </a>

                        <a href="#" class="relative group text-white font-medium hover:text-red-100 transition duration-300">
                        Monitoring
                        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-200 transition-all duration-300 group-hover:w-full"></span>
                        </a>

                        <a href="#" class="relative group text-white font-medium hover:text-red-100 transition duration-300">
                        History
                        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-200 transition-all duration-300 group-hover:w-full"></span>
                        </a>

                        <a href="#" class="relative group text-white font-medium hover:text-red-100 transition duration-300">
                        About
                        <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-red-200 transition-all duration-300 group-hover:w-full"></span>
                        </a>

                        <!-- LOGIN -->
                        <a href="#"
                        class="relative px-5 py-2.5 rounded-xl text-white font-medium
                        bg-gradient-to-r from-red-500 to-red-700
                        overflow-hidden group transition duration-300 hover:scale-105 shadow-md">

                        <span class="relative z-10">Logout</span>

                        <!-- Shine -->
                        <span class="absolute top-0 left-[-100%] w-full h-full bg-white/30
                        transform skew-x-[-20deg]
                        group-hover:left-[120%]
                        transition-all duration-700"></span>
                        </a>
                    </div>

                    <!-- MOBILE BUTTON -->
                    <div class="md:hidden">
                        <button id="menu-btn" class="text-white text-2xl">
                        ☰
                        </button>
                    </div>

                    </div>
                </div>
                <!-- MOBILE MENU -->
                <div id="menu" class="hidden md:hidden px-4 pb-4">
                    <div class="mt-2 backdrop-blur-lg bg-blue-300 rounded-xl p-4 shadow-lg border border-white/30">
                    <a href="#" class="block py-2 font-semibold text-white hover:text-blue-700">Home</a>
                    <a href="#" class="block py-2 font-semibold text-white hover:text-blue-700">Monitoring</a>
                    <a href="#" class="block py-2 font-semibold text-white hover:text-blue-700">History</a>
                    <a href="#" class="block py-2 font-semibold text-white hover:text-blue-700">About</a>
                    <a href="#" class="block mt-3 text-center bg-red-600 text-white py-2 rounded-xl hover:bg-red-700">
                        Logout
                    </a>
                    </div>
                </div>
            </nav>
            <!-- Main -->
            <main class="flex-1 p-6 pt-24">
                        <!-- Topbar -->
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                            <div class="flex items-center gap-3">
                                <div class="bg-red-800 text-white px-3 py-2 rounded-xl shadow text-sm md:text-base">
                                Disconnect
                                </div>
                                <span class="text-gray-600 text-sm md:text-base">Status</span>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                                <input 
                                type="text" 
                                placeholder="Cari menu..." 
                                class="w-full sm:w-auto px-4 py-2 rounded-xl border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                                >
                                <button class="bg-red-800 hover:bg-red-900 text-white px-4 py-2 rounded-xl shadow w-full sm:w-auto">
                                Logout
                                </button>
                            </div>
                        </div>

                        <!-- Header -->
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2 mb-4">
                            <div>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-700">Surakarta</h2>
                                <p class="text-xs md:text-sm text-gray-500">25 April 2026 • 07:45</p>
                            </div>
                            <div class="text-xs md:text-sm text-gray-500">
                                Realtime IoT Weather
                            </div>
                        </div>
                        <!-- Main Grid -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                            <!-- Weather Card -->
                            <div class="lg:col-span-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-3xl p-4 md:p-6 shadow-xl relative overflow-hidden">

                                <div class="absolute right-0 top-0 w-32 md:w-40 h-32 md:h-40 bg-white/10 rounded-full blur-2xl"></div>

                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 z-10 relative">

                                <!-- Left -->
                                <div class="flex items-center gap-4">
                                    <img src="sunny.png" class="w-20 md:w-28 drop-shadow-lg">
                                    <div>
                                    <p class="text-3xl md:text-5xl font-bold">26°C</p>
                                    <p class="text-xs md:text-sm opacity-90">Sebagian Berawan</p>
                                    </div>
                                </div>

                                <!-- Right -->
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs md:text-sm text-left sm:text-right">
                                    <div class="bg-white/20 px-3 py-1 rounded-lg">Kelembaban: 83%</div>
                                    <div class="bg-white/20 px-3 py-1 rounded-lg">Tekanan: 1008 hPa</div>
                                    <div class="bg-white/20 px-3 py-1 rounded-lg">Gas: 412 ppm</div>
                                </div>

                                </div>
                            </div>

                            <!-- Forecast Vertical -->
                            <div class="bg-white rounded-3xl p-4 shadow-lg">
                                <h4 class="font-semibold mb-3 text-gray-600 text-sm md:text-base">Today</h4>
                                <div class="space-y-3">
                                <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl text-sm">
                                    <span>☀️ 10:00</span>
                                    <span class="font-bold">30°C</span>
                                </div>
                                <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl text-sm">
                                    <span>⛅ 13:00</span>
                                    <span class="font-bold">32°C</span>
                                </div>
                                <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl text-sm">
                                    <span>☁️ 16:00</span>
                                    <span class="font-bold">30°C</span>
                                </div>
                                <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl text-sm">
                                    <span>🌙 19:00</span>
                                    <span class="font-bold">28°C</span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bottom Forecast -->
                        <div class="mt-6 bg-white rounded-3xl shadow-lg p-4 md:p-6">
                            <h3 class="font-semibold mb-4 text-gray-700 text-sm md:text-base">Prediksi Cuaca</h3>

                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3 text-center text-sm">

                                <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white p-3 md:p-4 rounded-xl shadow">
                                <p>25 Apr</p>
                                <p class="text-lg md:text-xl font-bold">30°C</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>10:00</p>
                                <p class="font-bold">30°C</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>13:00</p>
                                <p class="font-bold">32°C</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>16:00</p>
                                <p class="font-bold">30°C</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>24 Apr</p>
                                <p class="font-bold">32°C</p>
                                </div>

                            </div>
                        </div>
            </main>
            <!-- footer -->
            <footer class="glass mt-8 py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500"><span id="footerText">WS : Weather Salmaa Monitoring System</span> <span>© 2026 — All sensor data is simulated for demonstration</span>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>
<!-- SCRIPT -->
<script>
  const btn = document.getElementById('menu-btn');
  const menu = document.getElementById('menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>