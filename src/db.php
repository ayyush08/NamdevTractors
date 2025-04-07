<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'tractor_db';
$username = 'username';
$password = 'password';

try {
    // Connect to MySQL without database (to create it if it doesn't exist)
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $pdo->exec("USE `$dbname`");
    
    // Create tractors table
    $pdo->exec("CREATE TABLE IF NOT EXISTS `tractors` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `brand` VARCHAR(100) NOT NULL,
        `description` TEXT,
        `price` DECIMAL(10,2) NOT NULL,
        `horsepower` INT NOT NULL,
        `year` INT NOT NULL,
        `category` VARCHAR(50) NOT NULL,
        `stock` INT NOT NULL DEFAULT 0,
        `featured` BOOLEAN NOT NULL DEFAULT FALSE,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Check if data already exists
    $stmt = $pdo->query("SELECT COUNT(*) FROM `tractors`");
    $count = $stmt->fetchColumn();
    
    // Only insert sample data if the table is empty
    if ($count == 0) {
        // Insert sample data
        $tractors = [
            [
                'name' => 'Premium XL9000 Utility Tractor',
                'brand' => 'FarmPro',
                'description' => 'Our most popular utility tractor with advanced features for maximum productivity. Ideal for large farms with its powerful engine and versatile attachment options.',
                'price' => 125000,
                'horsepower' => 280,
                'year' => 2024,
                'category' => 'Utility',
                'stock' => 5,
                'featured' => true
            ],
            [
                'name' => 'Compact 2000 Garden Tractor',
                'brand' => 'GreenField',
                'description' => 'Perfect for small gardens and residential landscaping projects.',
                'price' => 24999,
                'horsepower' => 45,
                'year' => 2023,
                'category' => 'Garden',
                'stock' => 12,
                'featured' => false
            ],
            [
                'name' => 'Heavy Duty 8500 Industrial Tractor',
                'brand' => 'PowerMax',
                'description' => 'Built for the toughest industrial and construction applications.',
                'price' => 185000,
                'horsepower' => 420,
                'year' => 2024,
                'category' => 'Industrial',
                'stock' => 2,
                'featured' => false
            ],
            [
                'name' => 'AllTerrain 5000 Farm Tractor',
                'brand' => 'FarmPro',
                'description' => 'Versatile farm tractor designed for all types of agricultural work.',
                'price' => 78500,
                'horsepower' => 150,
                'year' => 2023,
                'category' => 'Farm',
                'stock' => 8,
                'featured' => false
            ],
            [
                'name' => 'EcoFriendly Electric Compact Tractor',
                'brand' => 'GreenField',
                'description' => 'Environmentally friendly electric tractor for sustainable farming.',
                'price' => 45000,
                'horsepower' => 60,
                'year' => 2024,
                'category' => 'Compact',
                'stock' => 15,
                'featured' => false
            ],
            [
                'name' => 'Vintage Restoration 1965 Classic',
                'brand' => 'Heritage',
                'description' => 'Fully restored vintage tractor, perfect for collectors and enthusiasts.',
                'price' => 35000,
                'horsepower' => 40,
                'year' => 1965,
                'category' => 'Vintage',
                'stock' => 1,
                'featured' => false
            ]
        ];
        
        $stmt = $pdo->prepare("INSERT INTO `tractors` 
            (`name`, `brand`, `description`, `price`, `horsepower`, `year`, `category`, `stock`, `featured`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        foreach ($tractors as $tractor) {
            $stmt->execute([
                $tractor['name'],
                $tractor['brand'],
                $tractor['description'],
                $tractor['price'],
                $tractor['horsepower'],
                $tractor['year'],
                $tractor['category'],
                $tractor['stock'],
                $tractor['featured']
            ]);
        }
        
        echo "Sample data inserted successfully!";
    } else {
        echo "Database already contains data. No sample data was inserted.";
    }
    
    echo "\nDatabase setup completed successfully!";
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>