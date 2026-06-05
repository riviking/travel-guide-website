<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin-login.php");
    exit();
}
include('../includes/db.php');
include('../includes/navbar.php');
?>

<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-container">
    <?php include('components/admin-sidebar.php'); ?>


    <div class="admin-content">
        <h2>Admin Dashboard</h2>
        <p>Welcome to the Travel Guide administration area. Use the links below to manage your content.</p>
        
        <div class="admin-dashboard-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
            <div class="card" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
                <h3>Countries</h3>
                <a href="add-country.php" class="btn-submit" style="display: inline-block; text-decoration: none; margin-top: 10px;">Add New Country</a>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
                <h3>Places</h3>
                <a href="add-place.php" class="btn-submit" style="display: inline-block; text-decoration: none; margin-top: 10px;">Add New Place</a>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
                <h3>Blog Posts</h3>
                <a href="#" class="btn-submit" style="display: inline-block; text-decoration: none; margin-top: 10px;">Manage Blogs</a>
            </div>
            <div class="card" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
                <h3>Travel Tips</h3>
                <a href="#" class="btn-submit" style="display: inline-block; text-decoration: none; margin-top: 10px;">Manage Tips</a>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
