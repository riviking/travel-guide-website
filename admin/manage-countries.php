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
        <h2>Manage Countries</h2>

        <?php
        // Handle Deletion
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $sql = "DELETE FROM countries WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert success'>Country deleted successfully!</div>";
            } else {
                echo "<div class='alert error'>Error deleting record: " . $conn->error . "</div>";
            }
        }
        ?>

        <table class="admin-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background: #f4f4f4; text-align: left;">
                    <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Description</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Image</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM countries ORDER BY id DESC");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['id']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['name']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>" . substr($row['description'], 0, 50) . "...</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['image']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>
                                    <a href='manage-countries.php?delete={$row['id']}' class='btn-del' style='color: red; text-decoration: none;' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='padding: 12px; text-align: center;'>No countries found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../includes/footer.php'); ?>