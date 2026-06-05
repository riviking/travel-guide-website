<?php
include('includes/db.php');
include('includes/navbar.php');
?>
<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-container">
    <?php include('components/admin-sidebar.php'); ?>

    <div class="admin-content">
        <h2>Manage Places</h2>

        <?php
        // Handle Deletion
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $sql = "DELETE FROM places WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert success'>Place deleted successfully!</div>";
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
                    <th style="padding: 12px; border: 1px solid #ddd;">Country</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Location</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT places.*, countries.name as country_name 
                        FROM places 
                        LEFT JOIN countries ON places.country_id = countries.id 
                        ORDER BY places.id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['id']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['name']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['country_name']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>{$row['location']}</td>
                                <td style='padding: 12px; border: 1px solid #ddd;'>
                                    <a href='manage-places.php?delete={$row['id']}' 
                                       class='btn-del' 
                                       style='color: red; text-decoration: none;' 
                                       onclick='return confirm(\"Are you sure you want to delete this place?\")'>
                                       Delete
                                    </a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='padding: 12px; text-align: center;'>No places found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>
