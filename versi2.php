<!doctype html>
<html lang="en" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeatherVision</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&amp;family=Space+Mono:wght@400;700&amp;display=swap" rel="stylesheet">
  <script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        outfit: ['Outfit', 'sans-serif'],
        mono: ['Space Mono', 'monospace']
      }
    }
  }
}
</script>
  <style>
html, body { height: 100%; margin: 0; }
body { font-family: 'Outfit', sans-serif; }

.glass {
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid rgba(255,255,255,0.12);
}
.glass-strong {
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(30px);
  border: 1px solid rgba(255,255,255,0.18);
}
.glass-card {
  background: rgba(255,255,255,0.06);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255,255,255,0.1);
  transition: all 0.3s ease;
}
.glass-card:hover {
  background: rgba(255,255,255,0.12);
  border-color: rgba(255,255,255,0.2);
  transform: translateY(-2px);
}

@keyframes float1 {
  0%,100% { transform: translate(0,0) scale(1); }
  50% { transform: translate(60px,-40px) scale(1.1); }
}
@keyframes float2 {
  0%,100% { transform: translate(0,0) scale(1); }
  50% { transform: translate(-50px,30px) scale(0.9); }
}
@keyframes float3 {
  0%,100% { transform: translate(0,0); }
  50% { transform: translate(40px,50px); }
}
.orb1 { animation: float1 20s ease-in-out infinite; }
.orb2 { animation: float2 25s ease-in-out infinite; }
.orb3 { animation: float3 18s ease-in-out infinite; }

@keyframes rain {
  0% { transform: translateY(-10px); opacity: 0; }
  50% { opacity: 1; }
  100% { transform: translateY(30px); opacity: 0; }
}
.raindrop { animation: rain 1.5s linear infinite; }

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.fade-up { animation: fadeUp 0.6s ease forwards; opacity: 0; }

@keyframes pulse-glow {
  0%,100% { box-shadow: 0 0 20px rgba(56,189,248,0.2); }
  50% { box-shadow: 0 0 40px rgba(56,189,248,0.4); }
}
.pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }

.chart-line {
  stroke-dasharray: 1000;
  stroke-dashoffset: 1000;
  animation: drawLine 2s ease forwards;
}
@keyframes drawLine {
  to { stroke-dashoffset: 0; }
}

.nav-link {
  position: relative;
  transition: color 0.3s;
}
.nav-link::after {
  content: '';
  position: absolute;
  bottom: -4px; left: 0;
  width: 0; height: 2px;
  background: linear-gradient(90deg, #38bdf8, #818cf8);
  transition: width 0.3s;
  border-radius: 2px;
}
.nav-link:hover::after, .nav-link.active::after { width: 100%; }

::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: rgba(0,0,0,0.1); }
::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 3px; }

.section-view { display: none; }
.section-view.active { display: block; }
</style>
  <style>body { box-sizing: border-box; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full overflow-auto bg-slate-950 text-white">
  <div id="app-wrapper" class="w-full min-h-full relative"><!-- Animated background orbs -->
   <div class="fixed inset-0 overflow-hidden pointer-events-none" style="z-index:0">
    <div class="orb1 absolute top-[10%] left-[15%] w-80 h-80 rounded-full" style="background:radial-gradient(circle,rgba(56,189,248,0.15),transparent 70%)"></div>
    <div class="orb2 absolute top-[50%] right-[10%] w-96 h-96 rounded-full" style="background:radial-gradient(circle,rgba(129,140,248,0.12),transparent 70%)"></div>
    <div class="orb3 absolute bottom-[10%] left-[40%] w-72 h-72 rounded-full" style="background:radial-gradient(circle,rgba(14,165,233,0.1),transparent 70%)"></div>
   </div>
   <div class="relative" style="z-index:1"><!-- Navigation -->
    <nav class="glass-strong sticky top-0" style="z-index:50">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
      <div class="flex items-center gap-2">
       <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#38bdf8,#818cf8)">
        <svg width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round">
         <circle cx="12" cy="12" r="4" /><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41" />
        </svg>
       </div><span id="nav-title" class="text-lg font-bold tracking-tight">WeatherVision</span>
      </div>
      <div class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-300"><a href="#" class="nav-link active" data-section="home" onclick="switchSection('home',event)">Home</a> <a href="#" class="nav-link" data-section="dashboard" onclick="switchSection('dashboard',event)">Dashboard</a> <a href="#" class="nav-link" data-section="forecast" onclick="switchSection('forecast',event)">Forecast</a> <a href="#" class="nav-link" data-section="about" onclick="switchSection('about',event)">About</a>
      </div>
      <div class="flex items-center gap-3"><button id="refreshBtn" onclick="refreshData()" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium glass hover:bg-white/10 transition-all"> <i data-lucide="refresh-cw" style="width:14px;height:14px"></i> Refresh </button>
       <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium" style="background:rgba(34,197,94,0.15);color:#4ade80"><span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block"></span> Live
       </div><button class="md:hidden" onclick="toggleMobileMenu()"><i data-lucide="menu" style="width:22px;height:22px"></i></button>
      </div>
     </div><!-- Mobile menu -->
     <div id="mobileMenu" class="hidden md:hidden px-4 pb-4">
      <div class="flex flex-col gap-2 text-sm font-medium text-slate-300"><a href="#" class="py-2 px-3 rounded-lg hover:bg-white/5" onclick="switchSection('home',event)">Home</a> <a href="#" class="py-2 px-3 rounded-lg hover:bg-white/5" onclick="switchSection('dashboard',event)">Dashboard</a> <a href="#" class="py-2 px-3 rounded-lg hover:bg-white/5" onclick="switchSection('forecast',event)">Forecast</a> <a href="#" class="py-2 px-3 rounded-lg hover:bg-white/5" onclick="switchSection('about',event)">About</a>
      </div>
     </div>
    </nav><!-- HOME SECTION -->
    <section id="section-home" class="section-view active"><!-- Hero -->
     <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-16 pb-12">
      <div class="text-center max-w-3xl mx-auto fade-up">
       <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass text-xs font-medium text-sky-300 mb-6"><i data-lucide="cpu" style="width:14px;height:14px"></i> Powered by IoT + LSTM Neural Network
       </div>
       <h1 id="heroHeading" class="text-4xl sm:text-6xl font-extrabold leading-tight mb-4" style="background:linear-gradient(135deg,#fff 30%,#38bdf8 60%,#818cf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent">AI-Powered Weather Intelligence</h1>
       <p id="heroSubtext" class="text-base sm:text-lg text-slate-400 mb-8 max-w-xl mx-auto">Real-time IoT sensors meet LSTM deep learning prediction for hyperlocal weather forecasting</p>
       <div class="flex flex-wrap justify-center gap-3"><button onclick="switchSection('dashboard')" class="px-6 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-105" style="background:linear-gradient(135deg,#0ea5e9,#6366f1);box-shadow:0 4px 24px rgba(56,189,248,0.3)"> Open Dashboard <span class="ml-1">→</span> </button> <button onclick="switchSection('about')" class="px-6 py-3 rounded-xl font-semibold text-sm glass hover:bg-white/10 transition-all">Learn More</button>
       </div>
      </div><!-- Weather preview cards -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-16 fade-up" style="animation-delay:0.2s">
       <div class="glass-card rounded-2xl p-4 text-center pulse-glow">
        <div class="text-3xl mb-2">
         ☀️
        </div>
        <div id="heroTemp" class="text-2xl font-bold font-mono">
         31°C
        </div>
        <div class="text-xs text-slate-400 mt-1">
         Temperature
        </div>
       </div>
       <div class="glass-card rounded-2xl p-4 text-center">
        <div class="text-3xl mb-2">
         💧
        </div>
        <div class="text-2xl font-bold font-mono">
         72%
        </div>
        <div class="text-xs text-slate-400 mt-1">
         Humidity
        </div>
       </div>
       <div class="glass-card rounded-2xl p-4 text-center">
        <div class="text-3xl mb-2">
         💨
        </div>
        <div class="text-2xl font-bold font-mono">
         12 km/h
        </div>
        <div class="text-xs text-slate-400 mt-1">
         Wind Speed
        </div>
       </div>
       <div class="glass-card rounded-2xl p-4 text-center">
        <div class="text-3xl mb-2">
         🌡️
        </div>
        <div class="text-2xl font-bold font-mono">
         1013 hPa
        </div>
        <div class="text-xs text-slate-400 mt-1">
         Pressure
        </div>
       </div>
      </div><!-- IoT Features -->
      <div class="grid md:grid-cols-3 gap-4 mt-12 fade-up" style="animation-delay:0.4s">
       <div class="glass-card rounded-2xl p-6">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background:rgba(56,189,248,0.15)"><i data-lucide="radio" style="width:20px;height:20px;color:#38bdf8"></i>
        </div>
        <h3 class="font-bold mb-2">IoT Sensor Network</h3>
        <p class="text-sm text-slate-400">DHT22, BMP280, and anemometer sensors streaming real-time environmental data every 5 seconds.</p>
       </div>
       <div class="glass-card rounded-2xl p-6">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background:rgba(129,140,248,0.15)"><i data-lucide="brain" style="width:20px;height:20px;color:#818cf8"></i>
        </div>
        <h3 class="font-bold mb-2">LSTM Prediction</h3>
        <p class="text-sm text-slate-400">Long Short-Term Memory neural network trained on historical data for accurate 7-day forecasting.</p>
       </div>
       <div class="glass-card rounded-2xl p-6">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4" style="background:rgba(34,197,94,0.15)"><i data-lucide="shield-check" style="width:20px;height:20px;color:#4ade80"></i>
        </div>
        <h3 class="font-bold mb-2">96.2% Accuracy</h3>
        <p class="text-sm text-slate-400">Model achieves high accuracy with continuous retraining on incoming sensor data streams.</p>
       </div>
      </div>
     </div>
    </section><!-- DASHBOARD SECTION -->
    <section id="section-dashboard" class="section-view">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
       <div>
        <h2 class="text-2xl font-bold">Live Dashboard</h2>
        <p id="locationLabel" class="text-sm text-slate-400 flex items-center gap-1 mt-1"><i data-lucide="map-pin" style="width:14px;height:14px"></i> Jakarta, Indonesia</p>
       </div>
       <div class="flex items-center gap-2 text-xs text-slate-400"><i data-lucide="clock" style="width:14px;height:14px"></i> <span id="lastUpdate">Updated just now</span>
       </div>
      </div><!-- Current Weather Big Card -->
      <div class="glass-strong rounded-3xl p-6 sm:p-8 mb-6 relative overflow-hidden">
       <div class="absolute top-4 right-4 text-7xl opacity-30">
        ☀️
       </div>
       <div class="relative">
        <div class="text-sm font-medium text-sky-300 mb-1">
         Current Weather
        </div>
        <div class="flex items-end gap-2 mb-4"><span id="dashTemp" class="text-6xl sm:text-7xl font-extrabold font-mono leading-none">31</span> <span class="text-2xl font-light text-slate-400 mb-2">°C</span> <span class="ml-4 px-3 py-1 rounded-full text-xs font-medium" style="background:rgba(250,204,21,0.15);color:#fbbf24">Mostly Sunny</span>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4">
         <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(56,189,248,0.1)"><i data-lucide="droplets" style="width:18px;height:18px;color:#38bdf8"></i>
          </div>
          <div>
           <div class="text-xs text-slate-500">
            Humidity
           </div>
           <div class="font-bold font-mono">
            72%
           </div>
          </div>
         </div>
         <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(129,140,248,0.1)"><i data-lucide="wind" style="width:18px;height:18px;color:#818cf8"></i>
          </div>
          <div>
           <div class="text-xs text-slate-500">
            Wind
           </div>
           <div class="font-bold font-mono">
            12 km/h
           </div>
          </div>
         </div>
         <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(34,197,94,0.1)"><i data-lucide="gauge" style="width:18px;height:18px;color:#4ade80"></i>
          </div>
          <div>
           <div class="text-xs text-slate-500">
            Pressure
           </div>
           <div class="font-bold font-mono">
            1013 hPa
           </div>
          </div>
         </div>
         <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(251,191,36,0.1)"><i data-lucide="eye" style="width:18px;height:18px;color:#fbbf24"></i>
          </div>
          <div>
           <div class="text-xs text-slate-500">
            Visibility
           </div>
           <div class="font-bold font-mono">
            10 km
           </div>
          </div>
         </div>
        </div>
       </div>
      </div><!-- 24-Hour Forecast + Chart -->
      <div class="grid lg:grid-cols-5 gap-4 mb-6"><!-- Hourly Cards -->
       <div class="lg:col-span-2">
        <div class="glass rounded-2xl p-5">
         <h3 class="text-sm font-semibold text-slate-300 mb-4 flex items-center gap-2"><i data-lucide="clock" style="width:15px;height:15px"></i> 24-Hour Forecast</h3>
         <div class="space-y-2 max-h-72 overflow-y-auto pr-1" id="hourlyCards"></div>
        </div>
       </div><!-- Temperature Chart -->
       <div class="lg:col-span-3">
        <div class="glass rounded-2xl p-5">
         <h3 class="text-sm font-semibold text-slate-300 mb-4 flex items-center gap-2"><i data-lucide="trending-up" style="width:15px;height:15px"></i> Temperature &amp; Humidity (24h)</h3>
         <svg id="tempChart" viewbox="0 0 600 220" class="w-full"></svg>
        </div>
       </div>
      </div><!-- IoT Camera Section -->
      <div class="glass rounded-2xl p-5 mb-6">
       <h3 class="text-sm font-semibold text-slate-300 mb-4 flex items-center gap-2"><i data-lucide="camera" style="width:15px;height:15px"></i> IoT Camera Feed</h3>
       <div class="grid sm:grid-cols-2 gap-4">
        <div class="rounded-xl overflow-hidden relative" style="background:linear-gradient(135deg,#0c4a6e,#1e3a5f);aspect-ratio:16/9">
         <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400">
          <div class="text-5xl mb-3">
           🌤️
          </div>
          <div class="text-sm font-medium">
           Camera 1 — North
          </div>
          <div class="text-xs mt-1 opacity-60">
           Clear sky detected
          </div>
         </div>
         <div class="absolute top-3 right-3 flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-bold" style="background:rgba(239,68,68,0.8)"><span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span> REC
         </div>
        </div>
        <div class="rounded-xl overflow-hidden relative" style="background:linear-gradient(135deg,#1e3a5f,#0c4a6e);aspect-ratio:16/9">
         <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400">
          <div class="text-5xl mb-3">
           🌥️
          </div>
          <div class="text-sm font-medium">
           Camera 2 — East
          </div>
          <div class="text-xs mt-1 opacity-60">
           Partly cloudy
          </div>
         </div>
         <div class="absolute top-3 right-3 flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-bold" style="background:rgba(239,68,68,0.8)"><span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span> REC
         </div>
        </div>
       </div>
      </div>
     </div>
    </section><!-- FORECAST SECTION -->
    <section id="section-forecast" class="section-view">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
      <div class="mb-6">
       <h2 class="text-2xl font-bold">LSTM Forecast</h2>
       <p class="text-sm text-slate-400 mt-1">7-day prediction powered by deep learning</p>
      </div><!-- 7-Day Cards -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-8" id="weeklyForecast"></div><!-- Model Accuracy -->
      <div class="glass rounded-2xl p-6">
       <h3 class="text-sm font-semibold text-slate-300 mb-4 flex items-center gap-2"><i data-lucide="bar-chart-3" style="width:15px;height:15px"></i> LSTM Model Performance</h3>
       <div class="grid sm:grid-cols-3 gap-4">
        <div class="text-center p-4 rounded-xl" style="background:rgba(56,189,248,0.08)">
         <div class="text-3xl font-extrabold font-mono text-sky-400">
          96.2%
         </div>
         <div class="text-xs text-slate-400 mt-1">
          Accuracy
         </div>
        </div>
        <div class="text-center p-4 rounded-xl" style="background:rgba(129,140,248,0.08)">
         <div class="text-3xl font-extrabold font-mono text-indigo-400">
          0.83
         </div>
         <div class="text-xs text-slate-400 mt-1">
          RMSE (°C)
         </div>
        </div>
        <div class="text-center p-4 rounded-xl" style="background:rgba(34,197,94,0.08)">
         <div class="text-3xl font-extrabold font-mono text-green-400">
          0.97
         </div>
         <div class="text-xs text-slate-400 mt-1">
          R² Score
         </div>
        </div>
       </div>
      </div>
     </div>
    </section><!-- ABOUT SECTION -->
    <section id="section-about" class="section-view">
     <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
      <h2 class="text-2xl font-bold mb-6">About WeatherVision</h2>
      <div class="glass rounded-2xl p-6 sm:p-8 space-y-6">
       <div>
        <h3 class="font-bold text-lg mb-2 text-sky-300">System Architecture</h3>
        <p class="text-sm text-slate-400 leading-relaxed">WeatherVision integrates IoT sensor nodes (ESP32 + DHT22, BMP280, anemometer) with an LSTM-based deep learning model. Sensor data is transmitted via MQTT to a cloud backend, processed in real-time, and fed into the prediction pipeline.</p>
       </div>
       <div>
        <h3 class="font-bold text-lg mb-2 text-indigo-300">Technology Stack</h3>
        <div class="flex flex-wrap gap-2"><span class="px-3 py-1 rounded-full text-xs glass">ESP32</span> <span class="px-3 py-1 rounded-full text-xs glass">MQTT</span> <span class="px-3 py-1 rounded-full text-xs glass">Python</span> <span class="px-3 py-1 rounded-full text-xs glass">TensorFlow / Keras</span> <span class="px-3 py-1 rounded-full text-xs glass">LSTM</span> <span class="px-3 py-1 rounded-full text-xs glass">Flask API</span> <span class="px-3 py-1 rounded-full text-xs glass">Tailwind CSS</span>
        </div>
       </div>
       <div>
        <h3 class="font-bold text-lg mb-2 text-green-300">Data Pipeline</h3>
        <div class="flex flex-wrap items-center gap-2 text-xs text-slate-400"><span class="px-3 py-2 rounded-lg glass">📡 Sensors</span> <span>→</span> <span class="px-3 py-2 rounded-lg glass">🔗 MQTT</span> <span>→</span> <span class="px-3 py-2 rounded-lg glass">☁️ Cloud</span> <span>→</span> <span class="px-3 py-2 rounded-lg glass">🧠 LSTM</span> <span>→</span> <span class="px-3 py-2 rounded-lg glass">📊 Dashboard</span>
        </div>
       </div>
      </div>
     </div>
    </section><!-- Footer -->
    <footer class="glass mt-8 py-6">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500"><span id="footerText">WeatherVision IoT Platform v2.1</span> <span>© 2025 — All sensor data is simulated for demonstration</span>
     </div>
    </footer>
   </div>
  </div>
  <script>
// --- Sample Data ---
const hourlyData = [];
const icons = ['☀️','⛅','🌤️','☀️','⛅','🌦️','🌧️','🌧️','⛅','☀️','🌤️','⛅'];
const now = new Date();
for (let i = 0; i < 24; i++) {
  const h = new Date(now.getTime() + i * 3600000);
  hourlyData.push({
    hour: h.getHours().toString().padStart(2,'0') + ':00',
    temp: Math.round(27 + 6 * Math.sin((i - 6) * Math.PI / 12) + (Math.random()-0.5)*2),
    humidity: Math.round(60 + 20 * Math.cos((i - 6) * Math.PI / 12) + (Math.random()-0.5)*5),
    icon: icons[i % icons.length]
  });
}

const weeklyData = [
  { day: 'Today', icon: '☀️', high: 33, low: 25, status: 'Sunny', rain: 5 },
  { day: 'Tomorrow', icon: '⛅', high: 31, low: 24, status: 'Partly Cloudy', rain: 20 },
  { day: 'Wed', icon: '🌧️', high: 29, low: 23, status: 'Rain', rain: 75 },
  { day: 'Thu', icon: '🌧️', high: 28, low: 23, status: 'Heavy Rain', rain: 90 },
  { day: 'Fri', icon: '⛅', high: 30, low: 24, status: 'Cloudy', rain: 35 },
  { day: 'Sat', icon: '🌤️', high: 32, low: 25, status: 'Mostly Sunny', rain: 10 },
  { day: 'Sun', icon: '☀️', high: 34, low: 26, status: 'Clear', rain: 5 },
];

// --- Navigation ---
function switchSection(name, e) {
  if (e) e.preventDefault();
  document.querySelectorAll('.section-view').forEach(s => s.classList.remove('active'));
  document.getElementById('section-' + name)?.classList.add('active');
  document.querySelectorAll('.nav-link').forEach(l => {
    l.classList.toggle('active', l.dataset.section === name);
    l.style.color = l.dataset.section === name ? '#fff' : '';
  });
  document.getElementById('mobileMenu')?.classList.add('hidden');
}

function toggleMobileMenu() {
  document.getElementById('mobileMenu').classList.toggle('hidden');
}

// --- Render Hourly Cards ---
function renderHourly() {
  const c = document.getElementById('hourlyCards');
  c.innerHTML = '';
  hourlyData.slice(0, 12).forEach(h => {
    c.innerHTML += `<div class="flex items-center justify-between px-3 py-2 rounded-xl hover:bg-white/5 transition-all">
      <span class="text-xs text-slate-400 w-12 font-mono">${h.hour}</span>
      <span class="text-lg">${h.icon}</span>
      <span class="text-sm font-bold font-mono w-12 text-right">${h.temp}°</span>
      <span class="text-xs text-sky-400 w-10 text-right font-mono">${h.humidity}%</span>
    </div>`;
  });
}

// --- Render Chart ---
function renderChart() {
  const svg = document.getElementById('tempChart');
  const W = 600, H = 220, pad = { t: 20, b: 35, l: 35, r: 15 };
  const temps = hourlyData.map(h => h.temp);
  const hums = hourlyData.map(h => h.humidity);
  const minT = Math.min(...temps) - 2, maxT = Math.max(...temps) + 2;
  const xStep = (W - pad.l - pad.r) / (temps.length - 1);

  const toY = (v, min, max) => pad.t + (1 - (v - min) / (max - min)) * (H - pad.t - pad.b);

  let tempPath = '', humPath = '', tempArea = '';
  temps.forEach((t, i) => {
    const x = pad.l + i * xStep;
    const y = toY(t, minT, maxT);
    tempPath += (i === 0 ? 'M' : 'L') + x + ',' + y + ' ';
    if (i === 0) tempArea = 'M' + x + ',' + (H - pad.b) + ' L' + x + ',' + y + ' ';
    else tempArea += 'L' + x + ',' + y + ' ';
    if (i === temps.length - 1) tempArea += 'L' + x + ',' + (H - pad.b) + ' Z';
  });

  let humPathD = '';
  hums.forEach((h, i) => {
    const x = pad.l + i * xStep;
    const y = toY(h, 40, 100);
    humPathD += (i === 0 ? 'M' : 'L') + x + ',' + y + ' ';
  });

  let labels = '';
  [0, 6, 12, 18, 23].forEach(i => {
    const x = pad.l + i * xStep;
    labels += `<text x="${x}" y="${H - 8}" fill="#64748b" font-size="10" text-anchor="middle" font-family="Space Mono,monospace">${hourlyData[i].hour}</text>`;
  });

  // Y-axis labels
  for (let v = Math.ceil(minT); v <= maxT; v += 2) {
    const y = toY(v, minT, maxT);
    labels += `<text x="${pad.l - 8}" y="${y + 3}" fill="#64748b" font-size="9" text-anchor="end" font-family="Space Mono,monospace">${v}°</text>`;
    labels += `<line x1="${pad.l}" y1="${y}" x2="${W - pad.r}" y2="${y}" stroke="rgba(255,255,255,0.04)" />`;
  }

  svg.innerHTML = `
    <defs>
      <linearGradient id="tg" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.3"/>
        <stop offset="100%" stop-color="#38bdf8" stop-opacity="0"/>
      </linearGradient>
    </defs>
    ${labels}
    <path d="${tempArea}" fill="url(#tg)" />
    <path d="${tempPath}" fill="none" stroke="#38bdf8" stroke-width="2.5" stroke-linecap="round" class="chart-line"/>
    <path d="${humPathD}" fill="none" stroke="#818cf8" stroke-width="1.5" stroke-dasharray="4,4" opacity="0.6"/>
    <circle cx="${pad.l}" cy="${toY(temps[0], minT, maxT)}" r="4" fill="#38bdf8" stroke="#0f172a" stroke-width="2"/>
    <text x="${W - pad.r - 60}" y="${pad.t + 10}" fill="#38bdf8" font-size="10" font-family="Outfit">— Temp (°C)</text>
    <text x="${W - pad.r - 60}" y="${pad.t + 24}" fill="#818cf8" font-size="10" font-family="Outfit" opacity="0.6">--- Humidity (%)</text>
  `;
}

// --- Render Weekly Forecast ---
function renderWeekly() {
  const c = document.getElementById('weeklyForecast');
  c.innerHTML = '';
  weeklyData.forEach((d, i) => {
    c.innerHTML += `<div class="glass-card rounded-2xl p-5 fade-up" style="animation-delay:${i * 0.08}s">
      <div class="flex items-center justify-between mb-3">
        <span class="text-sm font-semibold">${d.day}</span>
        <span class="text-2xl">${d.icon}</span>
      </div>
      <div class="text-xs text-slate-400 mb-2">${d.status}</div>
      <div class="flex items-end gap-2 mb-3">
        <span class="text-2xl font-bold font-mono">${d.high}°</span>
        <span class="text-sm text-slate-500 font-mono">${d.low}°</span>
      </div>
      <div class="flex items-center gap-1.5 text-xs">
        <i data-lucide="cloud-rain" style="width:12px;height:12px;color:#38bdf8"></i>
        <div class="flex-1 h-1.5 rounded-full" style="background:rgba(255,255,255,0.08)">
          <div class="h-full rounded-full" style="width:${d.rain}%;background:linear-gradient(90deg,#38bdf8,#818cf8)"></div>
        </div>
        <span class="text-slate-400 font-mono">${d.rain}%</span>
      </div>
    </div>`;
  });
}

function refreshData() {
  const btn = document.getElementById('refreshBtn');
  btn.style.opacity = '0.5';
  btn.style.pointerEvents = 'none';
  // Simulate slight data variation
  hourlyData.forEach(h => {
    h.temp += Math.round((Math.random() - 0.5) * 2);
    h.humidity = Math.max(40, Math.min(95, h.humidity + Math.round((Math.random() - 0.5) * 4)));
  });
  document.getElementById('dashTemp').textContent = hourlyData[0].temp;
  document.getElementById('heroTemp').textContent = hourlyData[0].temp + '°C';
  renderHourly();
  renderChart();
  document.getElementById('lastUpdate').textContent = 'Updated just now';
  setTimeout(() => { btn.style.opacity = '1'; btn.style.pointerEvents = 'auto'; }, 600);
}

// --- Init ---
renderHourly();
renderChart();
renderWeekly();
lucide.createIcons();

// --- Element SDK ---
const defaultConfig = {
  site_title: 'WeatherVision',
  hero_heading: 'AI-Powered Weather Intelligence',
  hero_subtext: 'Real-time IoT sensors meet LSTM deep learning prediction for hyperlocal weather forecasting',
  location_name: 'Jakarta, Indonesia',
  footer_text: 'WeatherVision IoT Platform v2.1',
  background_color: '#0f172a',
  surface_color: '#1e293b',
  text_color: '#e2e8f0',
  primary_action_color: '#38bdf8',
  secondary_action_color: '#818cf8',
  font_family: 'Outfit',
  font_size: 16
};

function applyConfig(config) {
  const g = (k) => config[k] || defaultConfig[k];

  document.getElementById('nav-title').textContent = g('site_title');
  document.getElementById('heroHeading').textContent = g('hero_heading');
  document.getElementById('heroSubtext').textContent = g('hero_subtext');
  document.getElementById('locationLabel').innerHTML = `<i data-lucide="map-pin" style="width:14px;height:14px"></i> ${g('location_name')}`;
  document.getElementById('footerText').textContent = g('footer_text');

  const bg = g('background_color');
  const txt = g('text_color');
  const primary = g('primary_action_color');
  const secondary = g('secondary_action_color');
  document.body.style.backgroundColor = bg;
  document.body.style.color = txt;

  const font = g('font_family');
  const baseSize = g('font_size');
  document.body.style.fontFamily = `${font}, Outfit, sans-serif`;

  document.getElementById('heroHeading').style.fontSize = `${baseSize * 3}px`;
  document.getElementById('heroSubtext').style.fontSize = `${baseSize}px`;

  lucide.createIcons();
}

window.elementSdk.init({
  defaultConfig,
  onConfigChange: async (config) => applyConfig(config),
  mapToCapabilities: (config) => {
    const g = (k) => config[k] || defaultConfig[k];
    const mut = (k) => ({
      get: () => g(k),
      set: (v) => { config[k] = v; window.elementSdk.setConfig({ [k]: v }); }
    });
    return {
      recolorables: [mut('background_color'), mut('surface_color'), mut('text_color'), mut('primary_action_color'), mut('secondary_action_color')],
      borderables: [],
      fontEditable: mut('font_family'),
      fontSizeable: mut('font_size')
    };
  },
  mapToEditPanelValues: (config) => {
    const g = (k) => config[k] || defaultConfig[k];
    return new Map([
      ['site_title', g('site_title')],
      ['hero_heading', g('hero_heading')],
      ['hero_subtext', g('hero_subtext')],
      ['location_name', g('location_name')],
      ['footer_text', g('footer_text')]
    ]);
  }
});
</script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9ebee5a9f30ff936',t:'MTc3NjEyOTcyMi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>