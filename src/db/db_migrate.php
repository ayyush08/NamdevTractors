<?php
// Database migration script
$host = 'localhost';
$dbname = 'tractortrove';
$username = 'root';
$password = '';

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    echo "Database `$dbname` created or already exists.\n";

    // Switch to database
    $pdo->exec("USE `$dbname`");

    // Create tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tractors (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            brand VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            horsepower INT NOT NULL,
            stock INT DEFAULT 0,
            featured TINYINT(1) DEFAULT 0,
            photo_url VARCHAR(255) DEFAULT 'assets/default.jpg',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_featured (featured),
            INDEX idx_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `tractors` created/updated successfully.\n";

    // Check and seed initial data
    $stmt = $pdo->query("SELECT COUNT(*) FROM tractors");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO tractors (name, brand, description, price, horsepower, stock, featured, photo_url) VALUES
            ('AgriMax Pro X750', 'Powertrac', 'Advanced farming operations', 65000.00, 75, 10, 1, 'assets/pro_x750.jpg'),
            ('Compact C320', 'Powertrac', 'Small farm specialist', 28500.00, 32, 15, 0, 'assets/c320.jpg'),
            ('Utility U500', 'Powertrac', 'Medium agricultural work', 42000.00, 50, 8, 1, 'assets/u500.jpg'),
            ('Euro 50 Next', 'Powertrac', '4WD premium model', 84500.00, 52, 5, 1, 'assets/euro50.jpg'),
            ('Digitrac PP43i', 'Powertrac', 'Advanced utility tractor', 80000.00, 43, 12, 0, 'assets/pp43i.jpg');
        ");
        echo "Initial tractor data inserted.\n";
    } else {
        echo "Tractor table already contains data.\n";
    }

 

} catch (PDOException $e) {
    die("Migration failed: " . $e->getMessage());
}
?>
