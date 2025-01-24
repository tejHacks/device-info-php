

<?php
// Fetch server-side details

// Disk Space
$diskTotalSpace = disk_total_space("/");
$diskFreeSpace = disk_free_space("/");

// Convert bytes to GB
$diskTotalSpaceGB = round($diskTotalSpace / (1024 * 1024 * 1024), 2);
$diskFreeSpaceGB = round($diskFreeSpace / (1024 * 1024 * 1024), 2);

// RAM (memory usage) - using shell commands for more precise info (Linux servers)
$ramTotal = shell_exec('free -g | grep Mem | awk \'{print $2}\''); // Total RAM in GB
$ramUsed = shell_exec('free -g | grep Mem | awk \'{print $3}\''); // Used RAM in GB

// Number of Processors
$cpuCores = shell_exec('nproc'); // Linux command to get CPU cores

// Get the Server OS
$serverOS = php_uname();

// Format data for client-side display
$deviceInfo = [
    'diskTotalSpaceGB' => $diskTotalSpaceGB,
    'diskFreeSpaceGB' => $diskFreeSpaceGB,
    'ramTotal' => trim($ramTotal),
    'ramUsed' => trim($ramUsed),
    'cpuCores' => trim($cpuCores),
    'serverOS' => $serverOS
];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Device info web application using PHP, JavaScript">
    <meta name="description" content="A web application for seeing user Device Info.">
    <meta name="application-name" content="French Guru">
    <meta name="theme-color" content="#272727">
    <title>Device Info | PHP Web Application</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="" type="image/png">

    <!-- Scripts -->
    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.js" defer></script>
    <script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar { background: #272727; width: 12px; }
        ::-webkit-scrollbar-thumb { background: #808080; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background-color: #666; }
    body{
        background: white;
    }
    .download-btn button {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
}
        /* Container Styles */
        .content-box {
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .content-box:hover {
            transform: translateY(-5px);
            background-color: #f1f1f1;
        }
    </style>
<script src="assets/bootstrap-5.3.3/dist/js/bootstrap.min.js" defer></script>
</head>


<!-- PAGE BODY -->
 <body>
 <?php include_once("navbar.php"); ?>

 <div class="container mt-5">
        <div class="card-container">
            <!-- OS Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-laptop" aria-hidden="true"></i> 
                    <span>OS: </span> <span id="os"></span>
                </div>
            </div>

        
            <!-- Disk Space Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="bx bx-hdd" aria-hidden="true"></i>
                    <span>Disk Space: </span> 
                    <span><?php echo $deviceInfo['diskFreeSpaceGB']; ?> GB Free / <?php echo $deviceInfo['diskTotalSpaceGB']; ?> GB Total</span>
                </div>
            </div>

            <!-- RAM Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-microchip" aria-hidden="true"></i>
                    <span>RAM: </span> 
                    <span><?php echo $deviceInfo['ramUsed']; ?> GB Used / <?php echo $deviceInfo['ramTotal']; ?> GB Total</span>
                </div>
            </div>

            <!-- CPU Cores Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Processors: </span> 
                    <span><?php echo $deviceInfo['cpuCores']; ?> Cores</span>
                </div>
            </div>

            <!-- Server OS Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-server" aria-hidden="true"></i>
                    <span>Server OS: </span> 
                    <span><?php echo $deviceInfo['serverOS']; ?></span>
                </div>
            </div>
    
            <!-- Battery Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-battery-half" id="battery-icon" aria-hidden="true"></i>
                    <span>Battery: </span> <span id="battery"></span>
                </div>
            </div>

           

            <!-- Browser Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <span>Browser: </span> <span id="browser"></span>
                </div>
            </div>

            <!-- Screen Size Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-desktop" aria-hidden="true"></i>
                    <span>Screen Size: </span> <span id="screen-size"></span>
                </div>
            </div>

            <!-- Device Type Card -->
            <div class="card">  
                <div class="info-item">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <span>Device Type: </span> <span id="device-type"></span>
                </div>
            </div>

            <!-- Location Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>Location: </span> <span id="location"></span>
                </div>
            </div>

            <!-- Processor Information Card -->
            <div class="card">
                <div class="info-item">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Processors: </span> <span id="processors"></span>
                </div>
            </div>
        </div>

        <!-- Button to Download Data as JSON -->
        <div class="download-btn">
            <button class="btn btn-primary" onclick="downloadData()">Download Device Info</button>
        </div>
    </div>

    <script>
        // Set OS Information
        document.getElementById('os').textContent = navigator.platform;

        // Set Browser Information
        document.getElementById('browser').textContent = navigator.userAgent;

        // Set RAM Information

        // Set Screen Size Information
        document.getElementById('screen-size').textContent = `${window.innerWidth} x ${window.innerHeight} px`;

        // Set Device Type Detection
        function detectDeviceType() {
            const width = window.innerWidth;
            if (width < 768) {
                return 'Mobile';
            } else if (width >= 768 && width <= 1024) {
                return 'Tablet';
            } else {
                return 'Laptop/Desktop';
            }
        }
        document.getElementById('device-type').textContent = detectDeviceType();

        // Set Battery Information and Icon
        navigator.getBattery().then(function(battery) {
            function updateBatteryStatus() {
                document.getElementById('battery').textContent = `${Math.round(battery.level * 100)}% (${battery.charging ? 'Charging' : 'Discharging'})`;
                const batteryIcon = document.getElementById('battery-icon');
                batteryIcon.classList.toggle('fa-battery-full', battery.charging);
                batteryIcon.classList.toggle('fa-battery-empty', !battery.charging);
            }

            updateBatteryStatus();

            // Listen for battery changes in real time
            battery.addEventListener('levelchange', updateBatteryStatus);
            battery.addEventListener('chargingchange', updateBatteryStatus);
        });

        // Geolocation Information
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                document.getElementById('location').textContent = `Lat: ${lat}, Lon: ${lon}`;
            });
        } else {
            document.getElementById('location').textContent = "Geolocation not available.";
        }

        // Set Processors Information (basic info for now)
        const processorInfo = navigator.hardwareConcurrency || 'Unknown';
        document.getElementById('processors').textContent = `${processorInfo} CPU(s)`;

        // Download Data as JSON
        function downloadData() {
            const deviceInfo = {
                OS: navigator.platform,
                Battery: document.getElementById('battery').textContent,
                Browser: navigator.userAgent,
                ScreenSize: `${window.innerWidth} x ${window.innerHeight} px`,
                DeviceType: detectDeviceType(),
                Location: document.getElementById('location').textContent,
                Processors: `${navigator.hardwareConcurrency || 'Unknown'} CPU(s)`
            };

            const dataStr = JSON.stringify(deviceInfo, null, 2);
            const blob = new Blob([dataStr], { type: 'application/json' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'device_info.json';
            link.click();
        }
    </script>
</body>
</html>