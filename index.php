<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glass Navbar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
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
                            <img src="asset/logo.png" 
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
                                <div class="bg-red-800 text-white px-3 py-2 rounded-xl shadow text-sm md:text-base" id="status">
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
                            <div class="lg:col-span-2 rounded-3xl bg-white shadow-xl overflow-hidden">

                                <!-- ATAS (IMAGE + SUHU) -->
                                <div id="ganti" class="relative bg-[url(asset/bgnight.gif)] bg-cover bg-center p-5 md:p-6 flex justify-between items-center min-h-[140px] md:min-h-[180px] rounded-t-3xl overflow-hidden">
                                    <!-- OVERLAY (biar teks kebaca) -->
                                    <div class="absolute inset-0 bg-blue/30"></div>
                                    <!-- KIRI (IMAGE CENTER VERTICAL) -->
                                    <div class="flex items-center h-full">
                                        <img src="asset/logosunny.png" class="w-28 sm:w-32 md:w-40 lg:w-48 drop-shadow-xl hover:scale-110 transition duration-300">
                                    </div>

                                    <!-- KANAN (SUHU) -->
                                    <div class="text-right text-White">
                                        <p id="temperaturedata" class="text-4xl text-red-400 sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-none">26</p>
                                        <p id="cuaca" class="text-xl md:text-sm text-red-400 opacity-90">Sun Shower</p>
                                    </div>
                                </div>

                                <!-- BAWAH (DATA SENSOR GRID) -->
                                <div class="bg-blue p-4 md:p-6">

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-center">

                                        <div class="bg-blue-50 p-3 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500">Humidity</p>
                                            <p id="humiditydata" class="font-bold text-blue-700">83</p> 
                
                                        </div>

                                        <div class="bg-blue-50 p-3 rounded-xl shadow-sm">
                                            <p class="text-xs text-gray-500">Pressure</p>
                                            <p id="pressuredata" class="font-bold text-blue-700">1008</p>
                                            
                                        </div>

                                        <div class="bg-blue-50 p-3 rounded-xl shadow-sm col-span-2 md:col-span-1">
                                            <p class="text-xs text-gray-500">Gas</p>
                                            <p id="gasdata" class="font-bold text-blue-700">412</p>
                                           
                                        </div>
                                        <div class="bg-blue-50 p-3 rounded-xl shadow-sm col-span-2 md:col-span-1">
                                            <p class="text-xs text-gray-500">Wind</p>
                                            <p id="winddata" class="font-bold text-blue-700">-</p>
                                            
                                        </div>

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
                            <h3 class="font-semibold mb-4 text-gray-700 text-sm md:text-base">Weather Prediction</h3>

                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3 text-center text-sm">

                                <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white p-3 md:p-4 rounded-xl shadow">
                                <p>Mon, 27 Apr</p>
                                <img src="asset/logosunny.png" class="w-16 sm:w-20 md:w-24 lg:w-28 mx-auto drop-shadow-lg hover:scale-110 transition duration-300">
                                <p class="text-lg md:text-xl font-bold">23-30°C</p>
                                <p>Sunny</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>Tue, 28 Apr</p>
                                <img src="asset/logocloudy.png" class="w-16 sm:w-20 md:w-24 lg:w-28 mx-auto drop-shadow-lg hover:scale-110 transition duration-300">
                                <p class="text-lg md:text-xl font-bold">23-30°C</p>
                                <p>Cloudy</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                <p>Wed, 29 Apr</p>
                                <img src="asset/logodrizzle.png" class="w-16 sm:w-20 md:w-24 lg:w-28 mx-auto drop-shadow-lg hover:scale-110 transition duration-300">
                                <p class="text-lg md:text-xl font-bold">23-30°C</p>
                                <p>Drizzle</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                 <p>Thu, 30 Apr</p>
                                <img src="asset/logoheavyr.png" class="w-16 sm:w-20 md:w-24 lg:w-28 mx-auto drop-shadow-lg hover:scale-110 transition duration-300">
                                <p class="text-lg md:text-xl font-bold">23-30°C</p>
                                <p>Heavy Rain</p>
                                </div>

                                <div class="bg-slate-100 p-3 md:p-4 rounded-xl">
                                 <p>Tue, 1 May</p>
                                <img src="asset/logosunny.png" class="w-16 sm:w-20 md:w-24 lg:w-28 mx-auto drop-shadow-lg hover:scale-110 transition duration-300">
                                <p class="text-lg md:text-xl font-bold">23-30°C</p>
                                <p>Sunny</p>
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

  const clientId = "salmaa" + Math.random().toString(16).substr(2, 8);
    const host = "wss://broker.emqx.io:8084/mqtt";
    
    const option = {
        keepalive: 60,
        clientId: clientId,
        username: "",
        password: "",
        protocolId: 'MQTT',
        protocolVersion: 4,
        clean: false,
        reconnectPeriod: 1000,
        connectTimeout: 3000,
    };

    console.log("Connect to Broker");
    const client = mqtt.connect(host, option);

    client.on("connect", () =>{
        console.log("Broker Connected, clientid : " + clientId );
        document.getElementById("status").innerHTML="Connected";
        document.getElementById("status").style.backgroundColor = "green";
    });

    client.subscribe('salmaa/#', { qos: 1 });

    client.on('message', function (topic, data) {
        //if(topic == "salmaa/bg"){
        //  document.getElementById("suhu").innerHTML = data;  
        //}
        //if(topic == "salmaa/kelembapan"){
        //  document.getElementById("lembab").innerHTML = data;  
        //}
        if(topic == "salmaa/cuaca"){
            if(data == "sunny"){
                document.getElementById("ganti").style.backgroundImage = "url('asset/bgsunny.gif')";
                document.getElementById("cuaca").innerHTML= "Sunny";
            }
            else if (data== "night"){
                document.getElementById("ganti").style.backgroundImage = "url('asset/bgnight.gif')";
                document.getElementById("cuaca").innerHTML= "Moonlit Night";
            }
            else {
                document.getElementById("ganti").style.backgroundImage = "url('asset/bgsunshower.gif')";
                document.getElementById("cuaca").innerHTML= "Sun Shower";
            }
        }
        if(topic == "salmaa/suhu"){
            document.getElementById("temperaturedata").innerHTML= data + "°C";
        }
        if(topic == "salmaa/lembab"){
            document.getElementById("humiditydata").innerHTML= data + "%";
        }
        if(topic == "salmaa/tekanan"){
            document.getElementById("pressuredata").innerHTML= data + " hPa";
        }
        if(topic == "salmaa/gas"){
            document.getElementById("gasdata").innerHTML= data + " Kohm";
        }
    });

    function led1(data1){
        client.publish("salmaa/led1", data1, {qos: 1, retain: true});
    }

</script>