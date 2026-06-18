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
        <h2>Add New Country</h2>
        
        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $stmt = $conn->prepare("INSERT INTO countries (name, description, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $description, $image);
            
            if ($stmt->execute()) {
                echo "<div class='alert success'>Country added successfully!</div>";
            } else {
                echo "<div class='alert error'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <form action="" method="POST" class="admin-form">
            <div class="form-group">
                <label>Country Name</label>
                <input type="text" name="name" required placeholder="e.g. Japan">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" required placeholder="Enter country details..."></textarea>
            </div>
            <div class="form-group">
                <label>Image Filename</label>
                <input type="text" name="image" placeholder="e.g. japan.jpg">
            </div>
            <button type="submit" name="submit" class="btn-submit">Save Country</button>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>