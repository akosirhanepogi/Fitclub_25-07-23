<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['isLoggedIn'])) {
    header('Location: dashboard.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Basic validation
    if (!empty($username) && !empty($email) && !empty($password)) {
        // In a real app, you would:
        // 1. Validate inputs
        // 2. Hash the password
        // 3. Store in database
        // 4. Then log the user in
        
        // For demo, just set session and redirect
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = $username;
        
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Please fill in all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sign Up - MJeshter Fitness</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body class="signup-page">
  <div class="signup-container">
    <div class="nav__logo">
      <img src="assets/logogym.jpg" alt="MJeshter Logo">
    </div>
    <h1>JOIN OUR GYM</h1>
    
    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <form id="signupForm" method="POST" action="signup.php">
      <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      
      <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      
      <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Create a password" required minlength="8">
      </div>
      
      <button type="submit" class="btnm">GET FIT NOW</button>
    </form>
    
    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
  </div>
</body>
</html>
