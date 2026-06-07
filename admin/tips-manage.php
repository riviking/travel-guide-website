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
        <h2>Manage Tips</h2>

        <?php
        // DELETE TIP
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);

            $sql = "DELETE FROM tips WHERE id = $id";
            if ($conn->query($sql)) {
                echo "<div class='alert success'>Tip deleted successfully!</div>";
            } else {
                echo "<div class='alert error'>Error deleting tip</div>";
            }
        }
        ?>

        <table class="admin-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM tips ORDER BY id DESC");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['category']}</td>
                            <td>" . substr($row['description'], 0, 60) . "...</td>
                            <td>{$row['image']}</td>
                            <td>
                                <a href='tips-manage.php?delete={$row['id']}'
                                   class='btn-del'
                                   onclick='return confirm(\"Delete this tip?\")'>
                                   Delete
                                </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>No tips found</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>
</div>

<?php include('../includes/footer.php'); ?>