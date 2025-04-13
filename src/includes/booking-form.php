<?php
require '../../vendor/autoload.php';
include '../db/db.php';
include '../config.php';
$resend = Resend::client('re_aNjh7Ayo_P3Gvp3JQEVVFc9VHmFPXVKBx');

$booking_success = false;
$error = '';
$tractor = null;


try {

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $tractorId = (int) $_GET['id'];
        $stmt = $pdo->prepare("
            SELECT t.*, o.email AS owner_email 
            FROM tractors t
            JOIN owners o ON t.owner_id = o.id
            WHERE t.id = ?
        ");
        $stmt->execute([$tractorId]);
        $tractor = $stmt->fetch();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate input
        $tractorId = (int) $_POST['tractor_id'];
        $name = htmlspecialchars($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $pickupDate = !empty($_POST['preferred_pickup_date']) ? $_POST['preferred_pickup_date'] : null;

        // Get tractor and owner details
        $stmt = $pdo->prepare("
            SELECT t.*, o.email AS owner_email 
            FROM tractors t
            JOIN owners o ON t.owner_id = o.id
            WHERE t.id = ?
        ");
        $stmt->execute([$tractorId]);
        $tractor = $stmt->fetch();

        if (!$tractor) {
            throw new Exception("Tractor not found");
        }

        // Create booking
        $stmt = $pdo->prepare("
            INSERT INTO bookings 
            (tractor_id, customer_name, customer_email, customer_phone, preferred_pickup_date)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$tractorId, $name, $email, $phone, $pickupDate]);

        // Send emails
        // Customer confirmation email
        $resend->emails->send([
            'from' => 'tractortrove@inkognito.tech',
            'to' => $email,
            'subject' => 'Booking Confirmation',
            'html' => "
                Dear {$name},<br><br>
                Thank you for booking the tractor '{$tractor['name']}'.<br><br>
                Please visit our shop to complete your purchase.<br>" .
                (!empty($pickupDate) ? "Preferred Pickup Date: {$pickupDate}<br>" : "") .
                "Shop Address: 123 Tractor Lane, YourCity<br><br>Thank you!"
        ]);

        // Owner notification email
        $resend->emails->send([
            'from' => 'tractortrove@inkognito.tech',
            'to' => $tractor['owner_email'],
            'subject' => 'New Tractor Booking',
            'html' => "
                New booking received!<br><br>
                Tractor: {$tractor['name']}<br>
                Customer: {$name} ({$email}, {$phone})<br>" .
                (!empty($pickupDate) ? "Preferred Pickup Date: {$pickupDate}<br>" : "")

        ]);

        // Redirect to success page or show success message
        $booking_success = true;
    }

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tractor Booking</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <?php include './header.php'; ?>

    <div class="container mx-auto p-4 flex-1">
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($booking_success): ?>
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6 mt-8 text-center">
                <h1 class="text-2xl font-bold mb-4">Booking Confirmed! ✅</h1>
                <p class="mb-4">Check your email for confirmation details.</p>
                <a href="<?= BASE_URL ?>index.php" class="text-blue-600 hover:underline">← Return to homepage</a>
            </div>

        <?php else: ?>
            <div class="bg-white p-6 mt-8 rounded-lg shadow max-w-2xl mx-auto">
                <h3 class="text-xl font-bold mb-4">Book This Tractor</h3>
                <form method="POST">
                    <input type="hidden" name="tractor_id" value="<?= $tractor['id'] ?>">


                    <div class="grid gap-4 mb-4">
                        <div>
                            <label class="block mb-1">Full Name</label>
                            <input type="text" name="name" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Email</label>
                            <input type="email" name="email" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Phone Number</label>
                            <input type="tel" name="phone" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Preferred Pickup Date (optional)</label>
                            <input type="date" name="preferred_pickup_date" class="w-full p-2 border rounded">
                        </div>
                    </div>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                        Confirm Booking
                    </button>
                </form>
            </div>

        <?php endif; ?>
    </div>
    <?php include './footer.php'; ?>

</body>

</html>