<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['isLoggedIn']) ){
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'] ?? '';
$active_page = $_GET['page'] ?? 'dashboard'; // Get current active page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_name'])) {
    $new_username = trim($_POST['new_username']);
    
    if (!empty($new_username)) {
        // In a real application, you would update this in your database
        $_SESSION['username'] = $new_username;
        $username = $new_username;
        
        // Show success message
        $_SESSION['message'] = 'Name updated successfully!';
        header('Location: ?page=settings');
        exit;
    } else {
        $error = "Name cannot be empty";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css" />
   
</head>
<body class="dashboard-page">
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>FitPro</h2>
                <?php if (!empty($username)): ?>
                    <div class="user-greeting">Welcome, <?php echo htmlspecialchars($username); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="sidebar-nav">
                <!-- Primary Navigation -->
                <a href="?page=dashboard" class="nav-item <?php echo $active_page === 'dashboard' ? 'active' : ''; ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                
                <!-- Fitness Section -->
                <div class="nav-section-header">FITNESS</div>
                <a href="?page=workouts" class="nav-item <?php echo $active_page === 'workouts' ? 'active' : ''; ?>">
                    <i class="fas fa-dumbbell"></i> Workouts
                </a>
                <a href="?page=plans" class="nav-item <?php echo $active_page === 'plans' ? 'active' : ''; ?>">
                    <i class="fas fa-clipboard-list"></i> Training Plans
                </a>
                <a href="?page=progress" class="nav-item <?php echo $active_page === 'progress' ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line"></i> Progress
                </a>
                
                <!-- Schedule Section -->
                <div class="nav-section-header">SCHEDULE</div>
                <a href="?page=schedule" class="nav-item <?php echo $active_page === 'schedule' ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-alt"></i> My Schedule
                </a>
                <a href="?page=classes" class="nav-item <?php echo $active_page === 'classes' ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i> Classes
                </a>
                
                <!-- Account Section -->
                <div class="nav-section-header">ACCOUNT</div>
                <a href="?page=profile" class="nav-item <?php echo $active_page === 'profile' ? 'active' : ''; ?>">
                    <i class="fas fa-user"></i> Profile
                </a>
                <a href="?page=settings" class="nav-item <?php echo $active_page === 'settings' ? 'active' : ''; ?>">
                    <i class="fas fa-cog"></i> Settings
                </a>
                
                <!-- Logout -->
                <div class="nav-item" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </div>
            </div>
            
            <div class="sidebar-footer">
                <div class="quick-stats">
                    <h4>Today's Activity</h4>
                    <div class="stat-item">
                        <span class="stat-value">2,450</span>
                        <span class="stat-label">Steps</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">45 min</span>
                        <span class="stat-label">Workout</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main-content">
            <?php if ($active_page === 'dashboard'): ?>
                <div class="hero-section">
                    <h1 class="hero-title">Make Your Body Shape</h1>
                    <p class="hero-text">Unleash your potential and embark on a journey towards a stronger, fitter, and more confident you. Track your progress and witness the incredible transformation your body is capable of!</p>
                    <button class="cta-button">GET STARTED</button>
                </div>
                
                <h2>Your Dashboard</h2>
                <div class="dashboard-cards">
                    <div class="card">
                        <h3 class="card-title">Access to our gym</h3>
                        <p>Check your membership status and access hours</p>
                    </div>
                    <div class="card">
                        <h3 class="card-title">Upcoming Events</h3>
                        <p>View and register for fitness classes and workshops</p>
                    </div>
                    <div class="card">
                        <h3 class="card-title">User Profile</h3>
                        <p>Update your personal information and fitness goals</p>
                    </div>
                </div>
            
            <?php elseif ($active_page === 'workouts'): ?>
                <h2>Workouts</h2>
                <div class="content-section">
                    <!-- Workouts content would go here -->
                </div>
            
            <?php elseif ($active_page === 'plans'): ?>
                <h2>Training Plans</h2>
                <div class="content-section">
                    <!-- Training plans content would go here -->
                </div>
            
            <?php elseif ($active_page === 'progress'): ?>
                <h2>Progress Tracker</h2>
                <div class="content-section">
                    <!-- Progress tracking content would go here -->
                </div>
            
            <?php elseif ($active_page === 'schedule'): ?>
                <h2>My Schedule</h2>
                <div class="content-section">
                    <!-- Schedule content would go here -->
                </div>
            
            <?php elseif ($active_page === 'classes'): ?>
                <h2>Classes</h2>
                <div class="content-section">
                    <!-- Classes content would go here -->
                </div>
            
            <?php elseif ($active_page === 'profile'): ?>
                <h2>My Profile</h2>
                <div class="content-section">
                    <!-- Profile content would go here -->
                </div>
            
                <?php elseif ($active_page === 'settings'): ?>
                <h2>Account Settings</h2>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="message success">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="message error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <div class="settings-form">
                    <h3>Change Your Name</h3>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="new_username">New Name</label>
                            <input type="text" id="new_username" name="new_username" 
                                   value="<?php echo htmlspecialchars($username); ?>" required>
                        </div>
                        <button type="submit" name="change_name" class="btn">Update Name</button>
                    </form>
                    
                    <h3 style="margin-top: 40px;">Account Security</h3>
                    <div class="security-options">
                        <a href="?page=change_password" class="security-item">
                            <i class="fas fa-lock"></i> Change Password
                        </a>
                        <a href="?page=email_preferences" class="security-item">
                            <i class="fas fa-envelope"></i> Email Preferences
                        </a>
                    </div>
                </div>
            
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Logout functionality
        document.getElementById('logoutBtn').addEventListener('click', function() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'logout.php';
            }
        });
    </script>
</body>
</html>
