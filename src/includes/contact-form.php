<?php
require '../../vendor/autoload.php';
include '../db/db.php';
include '../config.php';
$resend = Resend::client('re_aNjh7Ayo_P3Gvp3JQEVVFc9VHmFPXVKBx');

$contact_success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    try {
        // Send contact form submission email to owner
        $resend->emails->send([
            'from' => 'namdevtractors@inkognito.tech',
            'to' => $email,
            'subject' => 'Contact Form Submission Confirmation',
            'html' => "
                Dear {$name},<br><br>
                Thank you for reaching out to us. We'll get back to you as soon as possible.<br><br>
                Message: {$message}<br><br>Thank you!"
        ]);

        // Set success flag
        $contact_success = true;

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <?php include './header.php'; ?>

    <div class="container mx-auto p-4 flex-1 shadow-lg shadow-green-400">
        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($contact_success): ?>
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6 mt-8 text-center">
                <h1 class="text-2xl font-bold mb-4">Message Sent! ✅</h1>
                <p class="mb-4">We'll get back to you as soon as possible.</p>
                <a href="<?= BASE_URL ?>index.php" class="text-blue-600 hover:underline">← Return to homepage</a>
            </div>

        <?php else: ?>
            <div class="bg-white p-6 mt-8 mb-5 rounded-lg  max-w-2xl mx-auto shadow-lg shadow-green-400">
                <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                <form method="POST">
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
                            <label class="block mb-1">Message</label>
                            <textarea name="message" required class="w-full p-2 border rounded" rows="4"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 cursor-pointer rounded hover:bg-green-700">
                        Send Message
                    </button>
                </form>
            </div>

        <?php endif; ?>
    </div>
    <?php include './footer.php'; ?>
</body>

</html>
