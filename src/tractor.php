<?php include 'config.php' ?>
<?php include 'db/db.php';

// Get tractor ID from URL parameter
$tractorId = isset($_GET['id']) ? (int) $_GET['id'] : 0;


try {
    if ($tractorId <= 0) {
        header("Location: index.php");
        exit;
    }

    // Fetch the specific tractor
    $stmt = $pdo->prepare("SELECT * FROM tractors WHERE id = ?");
    $stmt->execute([$tractorId]);
    $tractor = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$tractor) {
        // Tractor not found
        header("Location: index.php");
        exit;
    }

    

} catch (PDOException $e) {
    die("Database query failed: " . $e->getMessage());
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['purchase'])) {
    $quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

    if ($quantity > 0 && $quantity <= $tractor['stock']) {
        // In a real application, you would process the purchase here
        // For now, just show a success message
        $message = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"> Your order for ' . $quantity . ' ' . htmlspecialchars($tractor['name']) . ' has been placed.</span>
        </div>';
    } else {
        $message = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"> Invalid quantity selected.</span>
        </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tractor['name']); ?> | TractorTrailblazer</title>
    <meta name="description" content="<?php echo htmlspecialchars($tractor['description']); ?>">
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

    <main class="container mx-auto px-6  py-8">


        <!-- <?php echo $message; ?> -->

        <!-- Tractor Details -->
        <div class="bg-white rounded-lg shadow-lg shadow-green-400  overflow-hidden mb-8">
            <div class="md:flex">
                <!-- Tractor Image -->
                <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-8">
                    <div class="relative w-full aspect-square max-w-md flex items-center justify-center">
                        <span class="tractor-icon text-gray-300 w-64 h-64"></span>

                    </div>
                </div>

                <!-- Tractor Info -->
                <div class="md:w-1/2 p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                            <?php echo htmlspecialchars($tractor['brand']); ?>
                        </span>
                        <?php if ($tractor['stock'] < 3): ?>
                            <span class="ml-2 bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                Only <?php echo $tractor['stock']; ?> left in stock
                            </span>
                        <?php else: ?>
                            <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                In Stock
                            </span>
                        <?php endif; ?>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        <?php echo htmlspecialchars($tractor['name']); ?>
                    </h1>

                    <div class="text-3xl font-bold text-green-600 mb-4">
                        $<?php echo number_format($tractor['price']); ?>
                    </div>

                    <p class="text-gray-700 mb-6">
                        <?php echo htmlspecialchars($tractor['description']); ?>
                    </p>

                    <a href="./includes/booking-form.php?id=<?= $tractorId ?>" name="purchase"
                        class="bg-green-600 cursor-pointer hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md transition-all">
                        Book Now
                    </a>




                    <!-- Delivery Info -->
                    <div class=" pt-4">
                        <div class="flex items-center text-gray-700 mb-2">

                            Free delivery available
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            2-year warranty included
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specifications -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 mx-auto">
            <div class="border-b border-gray-200">
                <div class="px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-900 text-center">Specifications</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="w-full max-w-md mx-auto">
                    <!-- Technical Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Technical Details</h3>
                        <ul class="space-y-3">
                            <li class="flex justify-between">
                                <span class="text-gray-600">Brand</span>
                                <span
                                    class="font-medium text-gray-900"><?php echo htmlspecialchars($tractor['brand']); ?></span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-600">Model</span>
                                <span
                                    class="font-medium text-gray-900"><?php echo htmlspecialchars($tractor['name']); ?></span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-600">Horsepower</span>
                                <span
                                    class="font-medium text-gray-900"><?php echo htmlspecialchars($tractor['horsepower']); ?>
                                    HP</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-600">Price</span>
                                <span
                                    class="font-medium text-gray-900">$<?php echo number_format($tractor['price'], 2); ?></span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-600">Stock</span>
                                <span
                                    class="font-medium text-gray-900"><?php echo htmlspecialchars($tractor['stock']); ?>
                                    units</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Features -->
                   
                </div>
            </div>
        </div>
        <!-- Related Tractors -->

    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php' ?>

    <script>
        // Quantity selector functionality
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const maxStock = <?php echo $tractor['stock']; ?>;

            decreaseBtn.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            increaseBtn.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue < maxStock) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Ensure quantity is within valid range when manually entered
            quantityInput.addEventListener('change', function () {
                let currentValue = parseInt(quantityInput.value);
                if (isNaN(currentValue) || currentValue < 1) {
                    quantityInput.value = 1;
                } else if (currentValue > maxStock) {
                    quantityInput.value = maxStock;
                }
            });
        });
    </script>
</body>

</html>