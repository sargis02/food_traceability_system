// Handle form submissions with fetch API for better UX
document.addEventListener('DOMContentLoaded', function() {
    // Handle all forms with AJAX
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const action = this.getAttribute('action');
            const method = this.getAttribute('method');
            
            fetch(action, {
                method: method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Create a notification div
                const notification = document.createElement('div');
                notification.className = 'notification success';
                notification.textContent = 'Operation completed successfully!';
                document.body.appendChild(notification);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    notification.remove();
                }, 3000);
                
                // If it's an edit form, redirect after success
                if (this.classList.contains('edit-form')) {
                    setTimeout(() => {
                        window.location.href = 'admin_dashboard.php?section=manage_products';
                    }, 1000);
                }
            })
            .catch(error => {
                const notification = document.createElement('div');
                notification.className = 'notification error';
                notification.textContent = 'Error: ' + error;
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            });
        });
    });
});

// Notification styling (added dynamically)
const style = document.createElement('style');
style.textContent = `
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px 20px;
    border-radius: 4px;
    color: white;
    z-index: 1000;
    animation: slideIn 0.5s forwards;
}
.notification.success {
    background: #27ae60;
}
.notification.error {
    background: #e74c3c;
}
@keyframes slideIn {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}
`;
document.head.appendChild(style);