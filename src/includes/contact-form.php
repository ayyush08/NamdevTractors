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

    $stmt = $pdo->prepare("SELECT email FROM owners WHERE id = ?");
    $stmt->execute([1]);
    $owner = $stmt->fetch(PDO::FETCH_ASSOC);

    try {
        // Send contact form submission email to owner
        $resend->emails->send([
            'from' => 'namdevtractors@inkognito.tech',
            'to' => $owner['email'],
            'subject' => 'Contact Form Submission Confirmation',
            'html' => "
                <h1>Contact Form Submission</h1>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>"
        ]);

        $resend->emails->send([
            'from'=>'namdevtractors@inkognito.tech',
            'to'=>$email,
            'subject'=>'Thank you for contacting us!',
            'html'=>"
                <h1>Thank you for contacting us!</h1>
                <p>Dear $name,</p>
                <p>Thank you for reaching out to us. We have received your message and will get back to you shortly.</p>
                <p>Best regards,<br>NamDev Tractors</p>"
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
                            <input placeholder="Enter your full name" type="text" name="name" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Email</label>
                            <input placeholder="Enter your email" type="email" name="email" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Mobile Number</label>
                            <input placeholder="Enter your mobile number" type="text" name="phone" required class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block mb-1">Message</label>
                            <textarea placeholder="Enter your query here" name="message" required class="w-full p-2 border rounded" rows="4"></textarea>
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
