<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tractor Details - TractorTrailblazer</title>
    <meta name="description" content="View detailed information about this tractor model.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tractor: {
                            DEFAULT: '#2A5E2A',
                            50: '#E8F0E8',
                            100: '#C7D9C7',
                            200: '#A6C1A6',
                            300: '#85A985',
                            400: '#649264',
                            500: '#437A43',
                            600: '#356235',
                            700: '#274927',
                            800: '#193119',
                            900: '#0A180A',
                        },
                        soil: {
                            DEFAULT: '#8B4513',
                            50: '#F5EBE3',
                            100: '#E6D0BB',
                            200: '#D7B593',
                            300: '#C89A6B',
                            400: '#B98044',
                            500: '#95672F',
                            600: '#764F26',
                            700: '#57381C',
                            800: '#382212',
                            900: '#190B09',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        .tractor-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            background-color: currentColor;
            mask-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='5.5' cy='17.5' r='3.5'/%3E%3Ccircle cx='18.5' cy='17.5' r='3.5'/%3E%3Cpath d='M10 17.5h3'/%3E%3Cpath d='M2 9h10l3 8'/%3E%3Cpath d='M15 9h6'/%3E%3Cpath d='M15 5v4'/%3E%3C/svg%3E");
            -webkit-mask-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='5.5' cy='17.5' r='3.5'/%3E%3Ccircle cx='18.5' cy='17.5' r='3.5'/%3E%3Cpath d='M10 17.5h3'/%3E%3Cpath d='M2 9h10l3 8'/%3E%3Cpath d='M15 9h6'/%3E%3Cpath d='M15 5v4'/%3E%3C/svg%3E");
            mask-size: contain;
            -webkit-mask-size: contain;
            mask-repeat: no-repeat;
            -webkit-mask-repeat: no-repeat;
            mask-position: center;
            -webkit-mask-position: center;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header (same as index.php) -->
    <?php include 'header.php'; ?>
    
    <main class="container mx-auto px-4 py-8">
        <?php
        // Get tractor ID from URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
        if ($id <= 0) {
            echo '<div class="text-center py-16">
                    <h1 class="text-2xl font-semibold text-gray-700">Invalid tractor ID</h1>
                    <p class="text-gray-500 mt-2">Please return to the <a href="index.php" class="text-tractor-600 hover:underline">tractor listing</a>.</p>
                  </div>';
            exit;
        }
        
        // Database connection parameters
        $host = 'localhost';
        $dbname = 'tractor_db';
        $username = 'username';
        $password = 'password';
        
        try {
            // Fallback data for demonstration
            $tractor = [
                'id' => 1,
                'name' => 'Premium XL9000 Utility Tractor',
                'brand' => 'FarmPro',
                'description' => 'Our most popular utility tractor with advanced features for maximum productivity. Ideal for large farms with its powerful engine and versatile attachment options. The Premium XL9000 includes a climate-controlled cabin, advanced GPS navigation, and automated systems for precision farming. This model has been our best-seller for three consecutive years, trusted by professional farmers worldwide for its reliability and performance in all conditions.',
                'price' => 125000,
                'horsepower' => 280,
                'year' => 2024,
                'category' => 'Utility',
                'stock' => 5,
                'features' => [
                    'Climate-controlled cabin with air filtration',
                    'Advanced GPS navigation system',
                    'Automated hydraulic system',
                    'LED lighting package',
                    'Precision farming controls',
                    'Ergonomic operator station',
                    'Extended warranty available'
                ],
                'specs' => [
                    'Engine' => 'FarmPro PowerTech 6.8L',
                    'Transmission' => 'AutoQuad PLUS 20-Speed',
                    'Hydraulics' => 'Closed-center, pressure-compensated',
                    'PTO' => '540/1000 rpm',
                    'Fuel Capacity' => '120 gallons (454 L)',
                    'Operating Weight' => '22,950 lbs (10,410 kg)',
                    'Dimensions' => '241" L x 125" W x 124" H'
                ]
            ];
            
            /*
            // Uncomment to use actual database
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare("SELECT * FROM tractors WHERE id = ?");
            $stmt->execute([$id]);
            $tractor = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$tractor) {
                echo '<div class="text-center py-16">
                        <h1 class="text-2xl font-semibold text-gray-700">Tractor not found</h1>
                        <p class="text-gray-500 mt-2">Please return to the <a href="index.php" class="text-tractor-600 hover:underline">tractor listing</a>.</p>
                      </div>';
                exit;
            }
            
            // In a real application, you would have separate tables for features and specs
            // For simplicity, we're using hardcoded arrays here
            */
        ?>
        
        <div class="mb-4">
            <a href="index.php" class="text-tractor-600 hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Tractors
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="md:flex">
                <!-- Tractor Image/Placeholder -->
                <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-8" style="min-height: 400px;">
                    <span class="tractor-icon text-gray-300" style="width: 200px; height: 200px;"></span>
                </div>
                
                <!-- Tractor Details -->
                <div class="md:w-1/2 p-6">
                    <div class="mb-4">
                        <span class="text-sm text-gray-500"><?php echo htmlspecialchars($tractor['brand']); ?></span>
                        <h1 class="text-3xl font-bold text-gray-900"><?php echo htmlspecialchars($tractor['name']); ?></h1>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-gray-500 text-sm">Horsepower</div>
                            <div class="text-xl font-semibold"><?php echo htmlspecialchars($tractor['horsepower']); ?> HP</div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-gray-500 text-sm">Year</div>
                            <div class="text-xl font-semibold"><?php echo htmlspecialchars($tractor['year']); ?></div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-gray-500 text-sm">Category</div>
                            <div class="text-xl font-semibold"><?php echo htmlspecialchars($tractor['category']); ?></div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded">
                            <div class="text-gray-500 text-sm">Stock</div>
                            <div class="text-xl font-semibold">
                                <?php echo $tractor['stock']; ?> available
                                <?php if ($tractor['stock'] < 3): ?>
                                <span class="text-amber-500 text-sm">(Low stock)</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-3xl font-bold text-tractor-600 mb-6">
                        $<?php echo number_format($tractor['price']); ?>
                    </div>
                    
                    <div class="space-y-3">
                        <button class="w-full bg-tractor-600 text-white py-3 px-6 rounded-md font-semibold hover:bg-tractor-700 transition-colors">
                            Add to Cart
                        </button>
                        <button class="w-full border border-tractor-600 text-tractor-600 py-3 px-6 rounded-md font-semibold hover:bg-tractor-50 transition-colors">
                            Contact Sales Rep
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Tabs for Details, Specs, Features -->
            <div class="border-t">
                <div class="flex" id="tabs">
                    <button class="px-6 py-3 font-medium border-b-2 border-tractor-500 text-tractor-700 tab-active" data-target="description">
                        Description
                    </button>
                    <button class="px-6 py-3 font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" data-target="specifications">
                        Specifications
                    </button>
                    <button class="px-6 py-3 font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700" data-target="features">
                        Features
                    </button>
                </div>
                
                <div class="p-6">
                    <!-- Description Tab -->
                    <div id="description" class="tab-content">
                        <p class="text-gray-700 leading-relaxed">
                            <?php echo htmlspecialchars($tractor['description']); ?>
                        </p>
                    </div>
                    
                    <!-- Specifications Tab -->
                    <div id="specifications" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Technical Specifications</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($tractor['specs'] as $name => $value): ?>
                            <div class="border-b pb-2">
                                <span class="text-gray-500"><?php echo htmlspecialchars($name); ?>:</span>
                                <span class="font-medium ml-2"><?php echo htmlspecialchars($value); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Features Tab -->
                    <div id="features" class="tab-content hidden">
                        <h3 class="text-lg font-semibold mb-4">Key Features</h3>
                        <ul class="space-y-2">
                            <?php foreach ($tractor['features'] as $feature): ?>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-tractor-500 mr-2 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg>
                                <span><?php echo htmlspecialchars($feature); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        } catch (PDOException $e) {
            echo '<div class="text-center py-16">
                    <h1 class="text-2xl font-semibold text-gray-700">Error loading tractor details</h1>
                    <p class="text-gray-500 mt-2">Please try again later.</p>
                  </div>';
        }
        ?>
    </main>
    
    <!-- Footer (same as index.php) -->
    <?php include 'footer.php'; ?>
    
    <script>
        // Tab functionality
        document.querySelectorAll('#tabs button').forEach(tab => {
            tab.addEventListener('click', function() {
                // Hide all content
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show selected content
                document.getElementById(this.dataset.target).classList.remove('hidden');
                
                // Update active tab styling
                document.querySelectorAll('#tabs button').forEach(btn => {
                    btn.classList.remove('tab-active', 'border-tractor-500', 'text-tractor-700');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                
                this.classList.add('tab-active', 'border-tractor-500', 'text-tractor-700');
                this.classList.remove('border-transparent', 'text-gray-500');
            });
        });
    </script>
</body>
</html>
