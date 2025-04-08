<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $body = "
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Phone:</strong> {$phone}</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
    ";
    $headers = "From: {$email}\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send your message. Please try again later.']);
    }
} 
?>
<form id="contact-form" class="space-y-5" action="contact-form-handler.php" method="POST">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
        <input type="text" id="name" name="name"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
            required />
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
            required />
    </div>

    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
        <input type="tel" id="phone" name="phone"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent" />
    </div>

    <div>
        <label for="message"
            class="block text-sm font-medium text-gray-700 mb-1">Message</label>
        <textarea id="message" name="message" rows="4"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
            required></textarea>
    </div>

    <button type="submit" id="submit-btn"
        class="w-full btn-primary flex justify-center items-center">
        Send Message
    </button>
</form>

<script src="../js/contactForm.js"></script>