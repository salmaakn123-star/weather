<!-- NAVBAR GLASS -->
<nav class="fixed w-full z-50 backdrop-blur-lg bg-white/30 border-b border-white/20 shadow-lg">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center h-16">

      <!-- LOGO -->
      <div class="flex items-center space-x-3">
        <div class="w-12 h-12 flex items-center justify-center text-blue-700 font-bold">
        <img src="logo.png" class="mask-top w-50 mx-auto">
        </div>
        <span class="font-semibold text-gray-800 text-lg">Weather Monitoring System</span>
      </div>

      <!-- MENU DESKTOP -->
      <div class="hidden md:flex items-center space-x-8">

        <a href="#" class="relative group text-gray-700 font-medium hover:text-blue-700 transition duration-300">
          Home
          <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <a href="#" class="relative group text-gray-700 font-medium hover:text-blue-700 transition duration-300">
          Monitoring
          <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <a href="#" class="relative group text-gray-700 font-medium hover:text-blue-700 transition duration-300">
          History
          <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <a href="#" class="relative group text-gray-700 font-medium hover:text-blue-700 transition duration-300">
          About
          <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <!-- LOGIN -->
        <a href="#"
          class="relative px-5 py-2.5 rounded-xl text-white font-medium
          bg-gradient-to-r from-blue-500 to-blue-700
          overflow-hidden group transition duration-300 hover:scale-105 shadow-md">

          <span class="relative z-10">Login</span>

          <!-- Shine -->
          <span class="absolute top-0 left-[-100%] w-full h-full bg-white/30
          transform skew-x-[-20deg]
          group-hover:left-[120%]
          transition-all duration-700"></span>
        </a>
      </div>

      <!-- MOBILE BUTTON -->
      <div class="md:hidden">
        <button id="menu-btn" class="text-gray-700 text-2xl">
          ☰
        </button>
      </div>

    </div>
  </div>

  <!-- MOBILE MENU -->
  <div id="menu" class="hidden md:hidden px-4 pb-4">
    <div class="mt-2 backdrop-blur-lg bg-white/40 rounded-xl p-4 shadow-lg border border-white/30">
      <a href="#" class="block py-2 text-gray-700 hover:text-blue-700">Home</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-blue-700">Monitoring</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-blue-700">History</a>
      <a href="#" class="block py-2 text-gray-700 hover:text-blue-700">About</a>
      <a href="#" class="block mt-3 text-center bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700">
        Login
      </a>
    </div>
  </div>
</nav>

<!-- SCRIPT -->
<script>
  const btn = document.getElementById('menu-btn');
  const menu = document.getElementById('menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>

<div class="flex min-h-screen">

  <!-- Main -->
  <main class="flex-1 p-6">

    <!-- Topbar -->
    <div class="flex justify-between items-center mb-6">
      <div class="flex items-center gap-3">
        <div class="bg-blue-900 text-white px-4 py-2 rounded-xl shadow">🏠 Home</div>
        <span class="text-gray-600">Dashboard</span>
      </div>

      <div class="flex items-center gap-3">
        <input type="text" placeholder="Cari menu..." class="px-4 py-2 rounded-xl border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button class="bg-red-800 hover:bg-red-900 text-white px-4 py-2 rounded-xl shadow">Logout</button>
      </div>
    </div>

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <div>
        <h2 class="text-2xl font-bold text-slate-700">Surakarta</h2>
        <p class="text-sm text-gray-500">25 April 2026 • 07:45</p>
      </div>
      <div class="text-sm text-gray-500">Realtime IoT Weather</div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

      <!-- Weather Card -->
      <div class="lg:col-span-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-3xl p-6 shadow-xl flex justify-between items-center relative overflow-hidden">
        <div class="absolute right-0 top-0 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>

        <div class="flex items-center gap-5 z-10">
          <img src="sunny.png" class="w-28 drop-shadow-lg">
          <div>
            <p class="text-5xl font-bold">26°C</p>
            <p class="text-sm opacity-90">Sebagian Berawan</p>
          </div>
        </div>

        <div class="space-y-2 text-sm text-right z-10">
          <div class="bg-white/20 px-3 py-1 rounded-lg">Kelembaban: 83%</div>
          <div class="bg-white/20 px-3 py-1 rounded-lg">Tekanan Udara: 1008 hPa</div>
          <div class="bg-white/20 px-3 py-1 rounded-lg">Gas: 412 ppm</div>
        </div>
      </div>

      <!-- Forecast Vertical -->
      <div class="bg-white rounded-3xl p-4 shadow-lg">
        <h4 class="font-semibold mb-3 text-gray-600">Per 3 Jam</h4>
        <div class="space-y-3">
          <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl">
            <span>☀️ 10:00</span>
            <span class="font-bold">30°C</span>
          </div>
          <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl">
            <span>⛅ 13:00</span>
            <span class="font-bold">32°C</span>
          </div>
          <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl">
            <span>☁️ 16:00</span>
            <span class="font-bold">30°C</span>
          </div>
          <div class="flex justify-between items-center bg-slate-100 p-3 rounded-xl">
            <span>🌙 19:00</span>
            <span class="font-bold">28°C</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Bottom Forecast -->
    <div class="mt-6 bg-white rounded-3xl shadow-lg p-6">
      <h3 class="font-semibold mb-4 text-gray-700">Prediksi Cuaca</h3>
      <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">

        <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white p-4 rounded-xl shadow">
          <p>25 Apr</p>
          <p class="text-xl font-bold">30°C</p>
        </div>

        <div class="bg-slate-100 p-4 rounded-xl">
          <p>10:00</p>
          <p class="font-bold">30°C</p>
        </div>

        <div class="bg-slate-100 p-4 rounded-xl">
          <p>13:00</p>
          <p class="font-bold">32°C</p>
        </div>

        <div class="bg-slate-100 p-4 rounded-xl">
          <p>16:00</p>
          <p class="font-bold">30°C</p>
        </div>

        <div class="bg-slate-100 p-4 rounded-xl">
          <p>24 Apr</p>
          <p class="font-bold">32°C</p>
        </div>

      </div>
    </div>

  </main>
</div>
