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
        <h2>Add New Blog</h2>

        <?php
        if (isset($_POST['submit'])) {

            $title = $conn->real_escape_string($_POST['title']);
            $content = $conn->real_escape_string($_POST['content']);
            $author = $conn->real_escape_string($_POST['author']);
            $image = !empty($_POST['image']) ? $conn->real_escape_string($_POST['image']) : null;

            $sql = "INSERT INTO blog (title, content, image, author)
                    VALUES ('$title', '$content', '$image', '$author')";

            if ($conn->query($sql)) {
                echo "<div class='alert success'>Blog added successfully!</div>";
            } else {
                echo "<div class='alert error'>Error: " . $conn->error . "</div>";
            }
        }
        ?>

        <form method="POST" class="admin-form">

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required placeholder="Blog title">
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="8" required placeholder="Write blog content..."></textarea>
            </div>

            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" required placeholder="Author name">
            </div>

            <div class="form-group">
                <label>Image (optional)</label>
                <input type="text" name="image" placeholder="e.g. blogs/paris.jpg">
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Save Blog
            </button>

        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>