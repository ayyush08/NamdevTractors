<?php include 'config.php' ?>

<?php include 'db/db.php';

try {
    // Fetch featured tractor
    $featuredStmt = $pdo->query("SELECT * FROM tractors WHERE featured = 1 LIMIT 1");
    $featuredTractor = $featuredStmt->fetch(PDO::FETCH_ASSOC);

    // Fetch all tractors for listing
    $tractorsStmt = $pdo->query("SELECT * FROM tractors");
    $tractors = $tractorsStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database query failed: " . $e->getMessage());
}
;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TractorTrailblazer - Find Your Perfect Tractor</title>
    <meta name="description"
        content="Browse our collection of high-quality tractors for farming, landscaping, and industrial needs.">
    <link rel="stylesheet" href="./output.css">

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
    <?php include 'includes/header.php' ?>

    <main>
        <!-- Featured Tractor Section -->
        <div class="bg-green-600 text-white">
            <div class="container mx-auto px-4 py-12">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 mb-8 md:mb-0">
                        <div class="flex items-center mb-2">
                            <span
                                class="bg-green-200 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">FEATURED</span>
                            <span
                                class="ml-2 text-green-100"><?php echo htmlspecialchars($featuredTractor['brand']); ?></span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">
                            <?php echo htmlspecialchars($featuredTractor['name']); ?>
                        </h2>
                        <p class="text-green-100 mb-6">
                            <?php echo htmlspecialchars($featuredTractor['description']); ?>
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-green-700 p-3 rounded">
                                <div class="text-green-200 text-sm">Horsepower</div>
                                <div class="text-xl font-bold">
                                    <?php echo htmlspecialchars($featuredTractor['horsepower']); ?> HP
                                </div>
                            </div>

                            <div class="bg-green-700 p-3 rounded">
                                <div class="text-green-200 text-sm">Price</div>
                                <div class="text-xl font-bold">$<?php echo number_format($featuredTractor['price']); ?>
                                </div>
                            </div>

                        </div>
                        <button
                            class="bg-white cursor-pointer text-green-700 px-6 py-3 rounded-md font-semibold hover:bg-green-50 transition-colors">
                            View Details
                        </button>
                    </div>
                    <div class="w-full md:w-1/2 flex justify-center">
                        <div
                            class="bg-green-500 rounded-xl p-8 w-full max-w-md aspect-square flex items-center justify-center">
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
                try {
                    $tractorsStmt = $pdo->query("SELECT * FROM tractors");
                    $tractors = $tractorsStmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($tractors as $tractor) {
                        $formattedPrice = number_format($tractor['price']);
                        $lowStock = $tractor['stock'] < 3;
                        ?>
                        <div
                            class="overflow-hidden h-full flex flex-col hover:shadow-lg transition-shadow duration-300 rounded-lg border bg-white shadow-sm">
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


                                </div>
                                <p class="text-sm line-clamp-2 text-gray-600 mt-2">
                                    <?php echo htmlspecialchars($tractor['description']); ?>
                                </p>
                            </div>
                            <div class="p-4 pt-0 flex justify-between items-center mt-auto">
                                <div class="text-xl font-bold text-green-600">$<?php echo $formattedPrice; ?></div>
                                <a href="tractor.php?id=<?= $tractor['id'] ?>"
                                    class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors">
                                    View Details
                                </a>
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



        </div>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php' ?>


</body>

</html>