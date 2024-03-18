
<script>
    function hideMessage() {
        setTimeout(function() {
            var alertDivs = document.querySelectorAll('.alert');
            alertDivs.forEach(function(alertDiv) {
                alertDiv.style.display = 'none';
            });
        }, 9000); // 4 seconds
    }

    // Call the hideMessage function when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        hideMessage();
    });
</script>