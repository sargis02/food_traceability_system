<?php
session_start();
include('db_connection.php');

// Redirect to login if not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Determine which content to load
$section = isset($_GET['section']) ? $_GET['section'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js"></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <div class="user-info">
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
            <ul class="menu">
                <li><a href="?section=home" class="<?php echo $section == 'home' ? 'active' : ''; ?>">Dashboard</a></li>
                
                <li class="menu-category">Product Management</li>
                <li><a href="?section=manage_products" class="<?php echo $section == 'manage_products' ? 'active' : ''; ?>">Manage Products</a></li>
                
                
                <li class="menu-category">Batch Tracking</li>
                <li><a href="?section=assign_identifiers" class="<?php echo $section == 'assign_identifiers' ? 'active' : ''; ?>">Assign Identifiers</a></li>
                <li><a href="?section=view_identifiers" class="<?php echo $section == 'view_identifiers' ? 'active' : ''; ?>">View Identifiers</a></li>
                
                <li class="menu-category">Quality Control</li>
                <li><a href="?section=record_quality" class="<?php echo $section == 'record_quality' ? 'active' : ''; ?>">Record QC</a></li>
                <li><a href="?section=view_quality" class="<?php echo $section == 'view_quality' ? 'active' : ''; ?>">View QC</a></li>
                
                <li class="menu-category">Environment</li>
                <li><a href="?section=record_temperature" class="<?php echo $section == 'record_temperature' ? 'active' : ''; ?>">Record Temp/Humidity</a></li>
                <li><a href="?section=view_temperature" class="<?php echo $section == 'view_temperature' ? 'active' : ''; ?>">View Temp/Humidity</a></li>
                
                <li class="menu-category">Issue Tracking</li>
                <li><a href="?section=record_affected" class="<?php echo $section == 'record_affected' ? 'active' : ''; ?>">Record Affected</a></li>
                <li><a href="?section=view_affected" class="<?php echo $section == 'view_affected' ? 'active' : ''; ?>">View Affected</a></li>
            </ul>
        </div>
        
        <!-- Main Content Area -->
        <div class="main-content">
            <?php
            // Load the appropriate content based on section
            switch($section) {
                case 'manage_products':
                    include('manage_products.php');
                    break;
                case 'add_product':
                    include('add_product.html');
                    break;
                case 'edit_product':
                    include('edit_product.php');
                    break;
                case 'assign_identifiers':
                    include('assign_identifiers.html');
                    break;
                case 'view_identifiers':
                    include('view_identifiers.php');
                    break;
                case 'record_quality':
                    include('record_quality_control.html');
                    break;
                case 'view_quality':
                    include('view_quality_control.php');
                    break;
                case 'record_temperature':
                    include('record_temperature_humidity.html');
                    break;
                case 'view_temperature':
                    include('view_temperature_humidity.php');
                    break;
                case 'record_affected':
                    include('record_affected_batches.html');
                    break;
                case 'view_affected':
                    include('view_affected_batches.php');
                    break;
                default:
                    // Dashboard home content
                    echo '<div class="dashboard-home">';
                    echo '<h2>Welcome to the Admin Dashboard</h2>';
                    echo '<div class="stats-container">';
                    
                    // Product Count
                    $productCount = mysqli_query($conn, "SELECT COUNT(*) as count FROM Products");
                    $productRow = mysqli_fetch_assoc($productCount);
                    echo '<div class="stat-card"><h3>Total Products</h3><p>'.$productRow['count'].'</p></div>';
                    
                    // Recent Issues
                    $issueCount = mysqli_query($conn, "SELECT COUNT(*) as count FROM Affected_Batches WHERE affected_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
                    $issueRow = mysqli_fetch_assoc($issueCount);
                    echo '<div class="stat-card"><h3>Recent Issues</h3><p>'.$issueRow['count'].'</p></div>';
                    
                    // Recent QC Checks
                    $qcCount = mysqli_query($conn, "SELECT COUNT(*) as count FROM Quality_Control_Inspection WHERE check_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
                    $qcRow = mysqli_fetch_assoc($qcCount);
                    echo '<div class="stat-card"><h3>Recent QC Checks</h3><p>'.$qcRow['count'].'</p></div>';
                    
                    echo '</div>';
                    echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>