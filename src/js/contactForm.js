document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');

    if (contactForm) {
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
                    // Show success message and reset form
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
    }
});

function showMessage(text, type) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `p-4 rounded-lg mt-4 ${type === 'success'
        ? 'bg-green-100 text-green-800'
        : 'bg-red-100 text-red-800'}`;
    messageDiv.textContent = text;

    const container = document.querySelector('#contact-form').parentNode;
    container.insertBefore(messageDiv, contactForm.nextSibling);

    setTimeout(() => messageDiv.remove(), 5000);
}
