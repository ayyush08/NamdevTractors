<?php include 'config.php' ?>
<?php include 'db/db.php';

// Get tractor ID from URL parameter
$tractorId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$locale = 'en_IN';
$fmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);
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
                        <img src="<?= BASE_URL ?>/assets/<?= $tractor['photo_url'] ?>"
                            class=" text-gray-300 rounded-lg "></img>

                    </div>
                </div>

                <!-- Tractor Info -->
                <div class="p-6 w-1/2">
                    <div class=" flex flex-col justify-center h-full">

                        <div class="flex items-center mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                <?php echo htmlspecialchars($tractor['brand']); ?>
                            </span>
                            <?php if ($tractor['stock'] < 3): ?>
                                <span
                                    class="ml-2 bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                    Only <?php echo $tractor['stock']; ?> left in stock
                                </span>
                            <?php else: ?>
                                <span
                                    class="ml-2 bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                    In Stock
                                </span>
                            <?php endif; ?>
                        </div>

                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            <?php echo htmlspecialchars($tractor['name']); ?>
                        </h1>

                        <div class="text-3xl font-bold text-green-600 mb-4">
                            <?php echo $fmt->formatCurrency($tractor['price'], 'INR') ; ?>
                        </div>

                        <p class="text-gray-700 mb-6">
                            <?php echo htmlspecialchars($tractor['description']); ?>
                        </p>

                        <a
                        style="width: 50%;"
                         href="./includes/booking-form.php?id=<?= $tractorId ?>" name="purchase"
                        class="bg-green-600 cursor-pointer hover:bg-green-700 text-white font-bold py-3 px-4 text-center rounded-md transition-all ">
                        Book Now
                    </a>
                </div>
                    


                </div>
            </div>
        </div>

        <!-- Specifications -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 mx-auto shadow-green-400">
            <div class="p-6">
                <div class="w-full max-w-md mx-auto">
                    <!-- Technical Details -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Product Details</h3>
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
                                <span class="font-medium text-gray-900"> <?php echo $fmt->formatCurrency($tractor['price'], 'INR')  ?></span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-600">Stock</span>
                                <span
                                    class="font-medium text-gray-900"><?php echo htmlspecialchars($tractor['stock']); ?>
                                    units</span>
                            </li>
                        </ul>
                    </div>

             

                </div>
            </div>
        </div>
    

    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php' ?>


</body>

</html>