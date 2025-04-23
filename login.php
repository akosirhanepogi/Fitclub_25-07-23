<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header('Location: dashboard.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Basic validation
    if (!empty($email) && !empty($password)) {
        // In a real app, you would verify credentials against a database
        // For demo purposes, we'll just check they're not empty
        
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = $email; // Using email as username
        
        // Redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Please fill in both email and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - MJeshter Fitness</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body class="login-page">
    <div class="login-container">
        <div class="nav__logo">
            <img src="assets/logogym.jpg" alt="MJeshter Logo" />
        </div>
        <h1>WELCOME BACK</h1>
        
        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form id="loginForm" method="POST" action="login.php">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
    
            <button type="submit" class="btnm">SIGN IN</button>
        </form>
        
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign up here</a>
        </div>
    </div>

    <script src="function.js"></script>
</body>
</html>
