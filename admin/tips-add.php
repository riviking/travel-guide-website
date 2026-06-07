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
        <h2>Add New Tip</h2>

        <?php
        if (isset($_POST['submit'])) {

            $title = $conn->real_escape_string($_POST['title']);
            $description = $conn->real_escape_string($_POST['description']);
            $category = $conn->real_escape_string($_POST['category']);
            $image = !empty($_POST['image']) ? $conn->real_escape_string($_POST['image']) : null;

            $sql = "INSERT INTO tips (title, description, category, image)
                    VALUES ('$title', '$description', '$category', '$image')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert success'>Tip added successfully!</div>";
            } else {
                echo "<div class='alert error'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <form method="POST" class="admin-form">

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required placeholder="e.g. Pack Light">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="6" required placeholder="Enter tip details..."></textarea>
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" placeholder="e.g. Safety, Budget">
            </div>

            <div class="form-group">
                <label>Image (optional)</label>
                <input type="text" name="image" placeholder="e.g. tips/packing.jpg">
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Save Tip
            </button>

        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>