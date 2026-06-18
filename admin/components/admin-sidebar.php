<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
    <div class="admin-sidebar">
        <h3>Admin Panel</h3>
        <ul>
            <li><a href="admin-dashboard.php" class="<?php echo ($current_page == 'admin-dashboard.php') ? 'active' : ''; ?>">Dashboard</a></li>
            <li><a href="add-country.php" class="<?php echo ($current_page == 'add-country.php') ? 'active' : ''; ?>">Add Country</a></li>
            <li><a href="manage-countries.php" class="<?php echo ($current_page == 'manage-countries.php') ? 'active' : ''; ?>">Manage Countries</a></li>
            <li><a href="add-place.php" class="<?php echo ($current_page == 'add-place.php') ? 'active' : ''; ?>">Add Place</a></li>
            <li><a href="manage-places.php" class="<?php echo ($current_page == 'manage-places.php') ? 'active' : ''; ?>">Manage Places</a></li>
            <li><a href="blog-add.php" class="<?php echo ($current_page == 'blog-add.php') ? 'active' : ''; ?>">Add Blog</a></li>
            <li><a href="blog-manage.php" class="<?php echo ($current_page == 'blog-manage.php') ? 'active' : ''; ?>">Manage Blogs</a></li>
            <li><a href="tips-add.php" class="<?php echo ($current_page == 'tips-add.php') ? 'active' : ''; ?>">Add Tips</a></li>
            <li><a href="tips-manage.php" class="<?php echo ($current_page == 'tips-manage.php') ? 'active' : ''; ?>">Manage Tips</a></li>
        </ul>
    </div>