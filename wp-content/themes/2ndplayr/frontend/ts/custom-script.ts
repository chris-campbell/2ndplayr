document.addEventListener('DOMContentLoaded', function() {
    // Select all heading elements with an ID
    const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id], h5[id], h6[id]');
    const notification = document.getElementById('notification');
    
    // Function to show notification
    function showNotification(message) {
        notification.textContent = message;
        notification.classList.add('show');
        setTimeout(function() {
            notification.classList.remove('show');
        }, 3000);
    }
    
    // Add the hash symbol dynamically to each heading
    headings.forEach(function(heading) {
        const hashSpan = document.createElement('span');
        hashSpan.textContent = '#';
        hashSpan.classList.add('hash-symbol');
        heading.appendChild(hashSpan);

        // Add click event listener to each heading
        heading.addEventListener('click', function() {
            // Create the URL with the hash
            const url = window.location.origin + window.location.pathname + '#' + heading.id;
            
            // Copy the URL to the clipboard
            navigator.clipboard.writeText(url).then(function() {
                showNotification('Link copied to clipboard!');
            }).catch(function(error) {
                console.error('Failed to copy text: ', error);
            });
        });
    });
});