<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TractorTrailblazer - Find Your Perfect Tractor</title>
    <meta name="description" content="Browse our collection of high-quality tractors for farming, landscaping, and industrial needs.">
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
        .tag-icon {
            display: inline-block;
            width: 16px;
            height: 16px;
            background-color: currentColor;
            mask-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z'/%3E%3Cpath d='M7 7h.01'/%3E%3C/svg%3E");
            -webkit-mask-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z'/%3E%3Cpath d='M7 7h.01'/%3E%3C/svg%3E");
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
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="text-tractor-600 font-bold text-2xl">
                        TractorTrailblazer
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-tractor-600 border-b-2 border-tractor-500 font-medium">Home</a>
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Tractors</a>
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Implements</a>
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Services</a>
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">About Us</a>
                    <a href="#" class="text-gray-700 hover:text-tractor-600 font-medium">Contact</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center text-tractor-800">
                        <span class="inline-block w-4 h-4 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </span>
                        <span class="font-medium">1-800-TRACTOR</span>
                    </div>
                    
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <span class="inline-block w-5 h-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                    </button>
                    
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <span class="inline-block w-5 h-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </span>
                    </button>
                    
                    <button class="md:hidden p-2 rounded-full hover:bg-gray-100" id="mobile-menu-button">
                        <span class="inline-block w-6 h-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="hidden bg-white border-t py-2 px-4 shadow-md" id="mobile-menu">
            <nav class="flex flex-col space-y-3 py-3">
                <a href="#" class="text-tractor-600 font-medium py-1">Home</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Tractors</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Implements</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Services</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">About Us</a>
                <a href="#" class="text-gray-700 hover:text-tractor-600 py-1">Contact</a>
                <div class="flex items-center text-tractor-800 py-1">
                    <span class="inline-block w-4 h-4 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </span>
                    <span>1-800-TRACTOR</span>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <!-- Featured Tractor Section -->
        <?php
        // Featured tractor data
        $featuredTractor = [
            'id' => 1,
            'name' => 'Premium XL9000 Utility Tractor',
            'brand' => 'FarmPro',
            'description' => 'Our most popular utility tractor with advanced features for maximum productivity. Ideal for large farms with its powerful engine and versatile attachment options.',
            'price' => 125000,
            'horsepower' => 280,
            'year' => 2024,
            'category' => 'Utility',
            'stock' => 5
        ];
        ?>
        <div class="bg-tractor-600 text-white">
            <div class="container mx-auto px-4 py-12">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 mb-8 md:mb-0">
                        <div class="flex items-center mb-2">
                            <span class="bg-tractor-100 text-tractor-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">FEATURED</span>
                            <span class="ml-2 text-tractor-100"><?php echo htmlspecialchars($featuredTractor['brand']); ?></span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo htmlspecialchars($featuredTractor['name']); ?></h2>
                        <p class="text-tractor-100 mb-6">
                            <?php echo htmlspecialchars($featuredTractor['description']); ?>
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-tractor-700 p-3 rounded">
                                <div class="text-tractor-200 text-sm">Horsepower</div>
                                <div class="text-xl font-bold"><?php echo htmlspecialchars($featuredTractor['horsepower']); ?> HP</div>
                            </div>
                            <div class="bg-tractor-700 p-3 rounded">
                                <div class="text-tractor-200 text-sm">Year</div>
                                <div class="text-xl font-bold"><?php echo htmlspecialchars($featuredTractor['year']); ?></div>
                            </div>
                            <div class="bg-tractor-700 p-3 rounded">
                                <div class="text-tractor-200 text-sm">Price</div>
                                <div class="text-xl font-bold">$<?php echo number_format($featuredTractor['price']); ?></div>
                            </div>
                            <div class="bg-tractor-700 p-3 rounded">
                                <div class="text-tractor-200 text-sm">Category</div>
                                <div class="text-xl font-bold"><?php echo htmlspecialchars($featuredTractor['category']); ?></div>
                            </div>
                        </div>
                        <button class="bg-white text-tractor-700 px-6 py-3 rounded-md font-semibold hover:bg-tractor-50 transition-colors">
                            View Details
                        </button>
                    </div>
                    <div class="w-full md:w-1/2 flex justify-center">
                        <div class="bg-tractor-500 rounded-xl p-8 w-full max-w-md aspect-square flex items-center justify-center">
                            <span class="tractor-icon text-white w-48 h-48"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tractor Listing Section -->
        <div class="container mx-auto px-4 py-8">
            <!-- Heading -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Browse Our Tractors</h1>
                <p class="text-gray-600 mt-2">
                    Find the perfect tractor for your farming, landscaping, or industrial needs.
                </p>
            </div>
            
            <!-- Tractor Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <?php
                // Connect to database
                $host = 'localhost';
                $dbname = 'tractor_db';
                $username = 'username';
                $password = 'password';
                
                try {
                    // This is a fallback if database connection fails
                    $tractors = [
                        [
                            'id' => 1,
                            'name' => 'Premium XL9000 Utility Tractor',
                            'brand' => 'FarmPro',
                            'description' => 'Our most popular utility tractor with advanced features for maximum productivity.',
                            'price' => 125000,
                            'horsepower' => 280,
                            'year' => 2024,
                            'category' => 'Utility',
                            'stock' => 5
                        ],
                        [
                            'id' => 2,
                            'name' => 'Compact 2000 Garden Tractor',
                            'brand' => 'GreenField',
                            'description' => 'Perfect for small gardens and residential landscaping projects.',
                            'price' => 24999,
                            'horsepower' => 45,
                            'year' => 2023,
                            'category' => 'Garden',
                            'stock' => 12
                        ],
                        [
                            'id' => 3,
                            'name' => 'Heavy Duty 8500 Industrial Tractor',
                            'brand' => 'PowerMax',
                            'description' => 'Built for the toughest industrial and construction applications.',
                            'price' => 185000,
                            'horsepower' => 420,
                            'year' => 2024,
                            'category' => 'Industrial',
                            'stock' => 2
                        ],
                        [
                            'id' => 4,
                            'name' => 'AllTerrain 5000 Farm Tractor',
                            'brand' => 'FarmPro',
                            'description' => 'Versatile farm tractor designed for all types of agricultural work.',
                            'price' => 78500,
                            'horsepower' => 150,
                            'year' => 2023,
                            'category' => 'Farm',
                            'stock' => 8
                        ],
                        [
                            'id' => 5,
                            'name' => 'EcoFriendly Electric Compact Tractor',
                            'brand' => 'GreenField',
                            'description' => 'Environmentally friendly electric tractor for sustainable farming.',
                            'price' => 45000,
                            'horsepower' => 60,
                            'year' => 2024,
                            'category' => 'Compact',
                            'stock' => 15
                        ],
                        [
                            'id' => 6,
                            'name' => 'Vintage Restoration 1965 Classic',
                            'brand' => 'Heritage',
                            'description' => 'Fully restored vintage tractor, perfect for collectors and enthusiasts.',
                            'price' => 35000,
                            'horsepower' => 40,
                            'year' => 1965,
                            'category' => 'Vintage',
                            'stock' => 1
                        ]
                    ];
                    
                    /*
                    // Uncomment this to use actual database
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $stmt = $pdo->query("SELECT * FROM tractors LIMIT 6");
                    $tractors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    */
                    
                    foreach ($tractors as $tractor) {
                        $formattedPrice = number_format($tractor['price']);
                        $lowStock = $tractor['stock'] < 3;
                ?>
                <div class="overflow-hidden h-full flex flex-col hover:shadow-lg transition-shadow duration-300 rounded-lg border bg-white shadow-sm">
                    <div class="relative h-48 bg-gray-100">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="tractor-icon text-gray-300 w-24 h-24"></span>
                        </div>
                        <?php if ($lowStock): ?>
                        <div class="absolute top-2 right-2">
                            <span class="bg-amber-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                Only <?php echo $tractor['stock']; ?> left
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 pb-0">
                        <h2 class="text-lg font-semibold"><?php echo htmlspecialchars($tractor['name']); ?></h2>
                        <div class="text-sm text-gray-500"><?php echo htmlspecialchars($tractor['brand']); ?></div>
                    </div>
                    <div class="p-4 flex-grow">
                        <div class="grid grid-cols-2 gap-2 text-sm mb-2">
                            <div class="flex items-center gap-1">
                                <span class="font-semibold">HP:</span> <?php echo $tractor['horsepower']; ?>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="font-semibold">Year:</span> <?php echo $tractor['year']; ?>
                            </div>
                            <div class="flex items-center gap-1 col-span-2">
                                <span class="tag-icon"></span>
                                <span><?php echo htmlspecialchars($tractor['category']); ?></span>
                            </div>
                        </div>
                        <p class="text-sm line-clamp-2 text-gray-600 mt-2"><?php echo htmlspecialchars($tractor['description']); ?></p>
                    </div>
                    <div class="p-4 pt-0 flex justify-between items-center mt-auto">
                        <div class="text-xl font-bold text-tractor-600">$<?php echo $formattedPrice; ?></div>
                        <button 
                            class="bg-tractor-500 text-white px-4 py-2 rounded hover:bg-tractor-600 transition-colors"
                            onclick="viewTractorDetails(<?php echo $tractor['id']; ?>)"
                        >
                            View Details
                        </button>
                    </div>
                </div>
                <?php
                    }
                } catch (PDOException $e) {
                    echo '<div class="col-span-full text-center py-16">
                            <h3 class="text-xl font-semibold text-gray-700">Unable to load tractors</h3>
                            <p class="text-gray-500 mt-2">Please try again later</p>
                          </div>';
                }
                ?>
            </div>
            
            <!-- Simple Pagination -->
            <div class="flex justify-center items-center mt-8 space-x-2">
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                    <span class="inline-block w-4 h-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </span>
                </a>
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-tractor-600 text-white">1</a>
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">3</a>
                <span class="px-2 text-gray-500">...</span>
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">10</a>
                <a href="#" class="flex items-center justify-center w-10 h-10 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                    <span class="inline-block w-4 h-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-tractor-900 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TractorTrailblazer</h3>
                    <p class="text-tractor-200 mb-4">
                        Your trusted partner in agricultural equipment since 1982.
                        Quality tractors for all your farming, landscaping, and industrial needs.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-tractor-200 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-tractor-200 hover:text-white">Tractors</a></li>
                        <li><a href="#" class="text-tractor-200 hover:text-white">Implements</a></li>
                        <li><a href="#" class="text-tractor-200 hover:text-white">Services</a></li>
                        <li><a href="#" class="text-tractor-200 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-tractor-200 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
                    <address class="not-italic text-tractor-200">
                        <p>123 Farmland Road</p>
                        <p>Tractor Town, AG 54321</p>
                        <p class="mt-2">Phone: (800) TRACTOR</p>
                        <p>Email: info@tractortrailblazer.com</p>
                    </address>
                </div>
            </div>
            <div class="border-t border-tractor-700 mt-8 pt-8 text-center text-tractor-300">
                <p>&copy; <?php echo date('Y'); ?> TractorTrailblazer. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Tractor details view function
        function viewTractorDetails(id) {
            alert('Viewing details for tractor #' + id + '\nThis would take you to a details page in a real application.');
            // In a real application, this would redirect to a details page:
            // window.location.href = 'tractor-details.php?id=' + id;
        }
    </script>
</body>
</html>

