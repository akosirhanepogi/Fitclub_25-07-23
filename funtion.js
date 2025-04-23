document.addEventListener('DOMContentLoaded', function() {
    // Login Form Handling
    const loginForm = document.getElementById('loginForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('email').value; // Using email as username
            const password = document.getElementById('password').value;
            
            // Basic validation
            if(username && password) {
                // Here you would typically verify credentials with server
                // For now, we'll just check they're not empty
                
                // Store that user is logged in
                sessionStorage.setItem('isLoggedIn', 'true');
                // Store the username for personalization
                sessionStorage.setItem('username', username);
                
                // Redirect to dashboard
                window.location.href = 'dashboard.html';
            } else {
                alert('Please fill in both email and password');
            }
        });
    }

    // Dashboard protection - check if user is logged in
    if (document.body.classList.contains('dashboard-page')) {
        if (sessionStorage.getItem('isLoggedIn') !== 'true') {
            window.location.href = 'index.html';
        } else {
            // Display username on dashboard if available
            const username = sessionStorage.getItem('username');
            if (username) {
                // Find all elements where we want to show the username
                const userDisplays = document.querySelectorAll('.user-greeting');
                userDisplays.forEach(el => {
                    el.textContent = `Welcome, ${username}`;
                });
            }
        }
    }

    // Logout functionality
    document.getElementById('logoutBtn').addEventListener('click', function() {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = 'logout.php';
        }
    });
        
    }
);
