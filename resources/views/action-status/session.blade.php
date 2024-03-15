
<script>
    // Function to show the notification with a message
    function showNotification(message, type) {
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notificationMessage');

        // Set the message and style based on the type
        notificationMessage.innerText = message;
        notification.classList.remove('hidden');
        notification.classList.remove('bg-green-500', 'bg-red-500');
        notification.classList.add(type === 'success' ? 'bg-green-500' : 'bg-red-500');
        notification.style.opacity = '1';

        // Hide the notification after 6 seconds
        setTimeout(function () {
            notification.style.opacity = '0';
        }, 6000);
    }

    // Check for session messages and display them as notifications
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = "{{ session('success') }}";
        const errorMessage = "{{ session('error') }}";

        if (successMessage) {
            showNotification(successMessage, 'success');
        }

        if (errorMessage) {
            showNotification(errorMessage, 'error');
        }
    });
</script>