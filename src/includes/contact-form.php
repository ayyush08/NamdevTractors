<?php
// include '../db/db.php';



$resend = Resend::client('re_aNjh7Ayo_P3Gvp3JQEVVFc9VHmFPXVKBx');

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
    try {
        // Connect to MySQL database

        // Fetch owner email from database
        $stmt = $pdo->prepare("SELECT email FROM owners WHERE id = 1 LIMIT 1");
        $stmt->execute();
        $owner = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$owner || empty($owner['email'])) {
            echo json_encode(['status' => 'error', 'message' => 'Owner email not found.']);
            exit;
        }

        $to = $owner['email']; 

        $subject = "New Contact Form Submission";
        $body = "
            <h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";
        

        $resend->emails->send([
            'from' => 'namdevtractors@inkognito.tech',
            'to' => $to,
            'subject' =>'New Contact Form Submission',
            'html' => "<h2>Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong><br>{$message}</p>",
                
        ]);


    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} 
?>
<form id="contact-form" class="space-y-5" method="POST">
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
        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
        <textarea id="message" name="message" rows="4"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-tractor-500 focus:border-transparent"
            required></textarea>
    </div>

    <button type="submit" id="submit-btn" class="w-full btn-primary flex justify-center items-center">
        Send Message
    </button>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        try {
            const formData = new FormData(contactForm);
            const response = await fetch(contactForm.action, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'success') {
                contactForm.reset();
                showMessage('Message sent successfully!', 'success');
            } else {
                showMessage(data.message || 'Submission failed', 'error');
            }
        } catch (error) {
            showMessage('Network error: Please try again', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Send Message';
        }
    });

    function showMessage(text, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `p-4 rounded-lg mt-4 ${type === 'success'
            ? 'bg-green-100 text-green-800'
            : 'bg-red-100 text-red-800'}`;
        messageDiv.textContent = text;

        contactForm.insertAdjacentElement('afterend', messageDiv);
        setTimeout(() => messageDiv.remove(), 5000);
    }
});
</script>
