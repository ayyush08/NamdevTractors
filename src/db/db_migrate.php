<?php
// Database migration script

$host = 'localhost';
$dbname = 'tractortrove'; // Replace with your database name
$username = 'root';
$password = '';

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    echo "Database `$dbname` created or already exists.\n";

    // Switch to the new database
    $pdo->exec("USE `$dbname`");

    // Create the `products` table if it doesn't exist
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            category VARCHAR(255) NOT NULL,
            power VARCHAR(50) NOT NULL,
            image_url TEXT NOT NULL,
            description TEXT NOT NULL,
            price VARCHAR(50) NOT NULL
        )
    ");
    echo "Table `products` created or already exists.\n";

    // Check if the table is empty before inserting initial data
    $stmt = $pdo->query("SELECT COUNT(*) FROM products");
    if ($stmt->fetchColumn() == 0) {
        // Insert initial data into the `products` table
        $pdo->exec("
            INSERT INTO products (name, category, power, image_url, description, price) VALUES
            ('AgriMax Pro X750', 'Heavy Duty', '75 HP', 'https://images.unsplash.com/photo-1598281003863-e12c6e30d510?ixlib=rb-4.0.3', 'Perfect for extensive farming operations, featuring advanced hydraulics system.', 'Starting at $65,000'),
            ('AgriMax Compact C320', 'Compact', '32 HP', 'https://images.unsplash.com/photo-1587129472816-74735d7a1b3a?ixlib=rb-4.0.3', 'Ideal for small farms and specialized applications, with optimal maneuverability.', 'Starting at $28,500'),
            ('AgriMax Utility U500', 'Utility', '50 HP', 'https://images.unsplash.com/photo-1624061259218-6e0d47b8d96b?ixlib=rb-4.0.3', 'Versatile and reliable, designed for medium-sized agricultural operations.', 'Starting at $42,000')
        ");
        echo "Initial product data inserted into `products` table.\n";
    } else {
        echo "`products` table already contains data.\n";
    }

} catch (PDOException $e) {
    die("Database setup failed: " . $e->getMessage());
}
?>
