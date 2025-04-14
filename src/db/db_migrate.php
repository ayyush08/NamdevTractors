<?php
// Database configuration
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

    // Switch to the database
    $pdo->exec("USE `$dbname`");

    // Create `tractors` table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tractors (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            brand VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            horsepower INT NOT NULL,
            stock INT DEFAULT 0,
            owner_id INT NOT NULL DEFAULT 1,
            photo_url VARCHAR(255) DEFAULT 'assets/default.jpg',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_created (created_at),
            featured BOOLEAN DEFAULT FALSE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `tractors` created/updated successfully.\n";

    // Create `owners` table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS owners (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL UNIQUE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `owners` created successfully.\n";

    // Create `bookings` table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS bookings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tractor_id INT NOT NULL,
            customer_name VARCHAR(255) NOT NULL,
            customer_email VARCHAR(255) NOT NULL,
            customer_phone VARCHAR(20) NOT NULL,
            preferred_pickup_date DATE NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (tractor_id) REFERENCES tractors(id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `bookings` created successfully.\n";

    $pdo->exec("
    CREATE TABLE IF NOT EXISTS tractor_features (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tractor_id INT NOT NULL,
        feature_name VARCHAR(255) NOT NULL,
        feature_value VARCHAR(255) NOT NULL,
        FOREIGN KEY (tractor_id) REFERENCES tractors(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");
echo "Table `tractor_features` created successfully.\n";

    // Seed initial data for `tractors` and `owners`
    $stmt = $pdo->query("SELECT COUNT(*) FROM tractors");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO tractors (name, brand, description, price, horsepower, stock, owner_id, photo_url,featured) VALUES
                ('AgriMax Pro X750', 'Powertrac', 'Advanced farming operations', 65000.00, 75, 10, 1, 'assets/pro_x750.jpg',1),
                ('Compact C320', 'Powertrac', 'Small farm specialist', 28500.00, 32, 15, 1, 'assets/c320.jpg',1),
                ('Utility U500', 'Powertrac', 'Medium agricultural work', 42000.00, 50, 8, 1, 'assets/u500.jpg',1),
                ('Euro 50 Next', 'Powertrac', '4WD premium model', 84500.00, 52, 5, 1, 'assets/euro50.jpg',0),
                ('Digitrac PP43i', 'Powertrac', 'Advanced utility tractor', 80000.00, 43, 12, 1, 'assets/pp43i.jpg',1);
        ");
        echo "Initial tractor data inserted.\n";
    } else {
        echo "Tractor table already contains data.\n";
    }

    $stmt = $pdo->query("SELECT COUNT(*) FROM owners");
    if ($stmt->fetchColumn() != 0) {
        $pdo->exec("
            UPDATE owners SET email = 'ayushkumargupta2908@gmail.com' WHERE id = 1
        ");
        echo "Initial owner data inserted.\n";
    } else {
        echo "Owners table already contains data.\n";
    }

} catch (PDOException $e) {
    die("Migration failed: " . $e->getMessage());
}
?>
