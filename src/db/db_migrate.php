<?php
// Database configuration
$host = 'localhost';
$dbname = 'namdevtractors';
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

    // Create `owners` table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS owners (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL UNIQUE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `owners` created successfully.\n";

    // Create `bookings` table

    $stmt = $pdo->query("SELECT COUNT(*) FROM owners");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO owners(email) VALUES('ayushkumargupta2908@gmail.com')
        ");
        echo "Initial owner data inserted.\n";
    } else {
        echo "Owners table already contains data.\n";
    }


    // Seed initial data for `tractors` and `owners`
    // Create `tractors` table (updated with image_name)
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
            image_name VARCHAR(255) DEFAULT '',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_created (created_at),
            featured BOOLEAN DEFAULT FALSE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table `tractors` created/updated successfully.\n";

    // Seed new tractor data
    $stmt = $pdo->query("SELECT COUNT(*) FROM tractors");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("
            INSERT INTO tractors (name, brand, description, price, horsepower, stock, owner_id, photo_url, image_name, featured) VALUES
                ('John Deere 5130M', 'John Deere', '4-cylinder 4.5L PowerTech™, 3700kg lift, ISOBUS, JDLink™', 3250000.00, 130, 4, 1, 'john_deere_5130m.jpg', 'john-deere-5130m', 0),
                ('Swaraj 855 FE', 'Swaraj', '3-cylinder, 3478CC, 2000kg lift, Oil-immersed brakes', 865000.00, 48, 6, 1, 'swaraj_855_fe.jpg', 'swaraj-855-fe', 0),
                ('Mahindra 575 DI XP Plus', 'Mahindra', '4-cylinder, 2979CC, 1500kg lift, 6-year warranty', 708000.00, 47, 8, 1, 'mahindra_575_di_xp_plus.jpg', 'mahindra-575-di-xp-plus', 1),
                ('New Holland 3630 TX Super Plus', 'New Holland', '3-cylinder, 2991CC, 1700kg lift, Power Steering', 920000.00, 50, 5, 1, 'new_holland_3630_tx_super_plus.jpg', 'new-holland-3630-tx-super-plus', 0),
                ('Sonalika RX 745 III Sikander', 'Sonalika', '3-cylinder, 3067CC, 2000kg lift, Oil-immersed brakes', 755000.00, 50, 7, 1, 'sonalika_rx_745_iii_sikander.jpg', 'sonalika-rx-745-iii-sikander', 1),
                ('Farmtrac 6050 Executive 4WD', 'Farmtrac', '4-cylinder, 1800kg lift, Power Steering', 820000.00, 50, 3, 1, 'farmtrac_6050_executive_4wd.jpg', 'farmtrac-6050-executive-4wd', 1);
        ");
        echo "New tractor data inserted.\n";
    } else {
        echo "Tractor table already contains data.\n";
    }

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

    

} catch (PDOException $e) {
    die("Migration failed: " . $e->getMessage());
}
?>