<?php 
include('includes/db.php');
include('includes/navbar.php');

?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-places" style="background-image: url('assets/images/backgrounds/places.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">🗺️ Places</h1>
        </div>

        <div class="bluish-section"></div>

<style>
.filter-section {
    max-width: 1100px;
    margin: 0 auto 20px;
    padding: 0 20px;
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

.filter-section label {
    font-weight: bold;
}

.filter-section select {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
}

.filter-section a {
    padding: 8px 16px;
    background: #1e90ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
}

.filter-section a:hover {
    background: #0d6fbf;
}

.rating {
    color: #ff9800;
    font-size: 14px;
    margin: 5px 0;
}

/* 🔥 NEW BUTTON STYLE */
.details-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 14px;
    background: #1e90ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.3s;
}

.details-btn:hover {
    background: #0d6fbf;
}
</style>

<div class="container">



<!-- Places Grid -->
<div class="grid">

<?php
// Query with/without filter
$sql = "SELECT * FROM places ORDER BY name";
$result = $conn->query($sql);
if (!$result) {
    die("Database error: " . $conn->error);
}

// Display places
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        // Image handling
        if (!empty($row['image']) && file_exists(__DIR__ . '/assets/images/' . $row['image'])) {
            $img = 'assets/images/' . $row['image'];
        } else {
            $img = 'assets/images/places/default.jpg';
        }
?>

    <div class="card">
        <img src="<?php echo $img; ?>">

        <div class="card-body">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>

            <p><?php echo htmlspecialchars($row['category'] ?? 'Unknown'); ?></p>

            <div class="rating">
                ⭐ <?php echo (!empty($row['rating'])) ? htmlspecialchars($row['rating']) : 'N/A'; ?>/5.0
            </div>

            <!-- 🔥 VIEW DETAILS BUTTON -->
            <a href="place-details.php?id=<?php echo $row['id']; ?>" class="details-btn">
                View Details
            </a>

        </div>
    </div>

<?php
    }
} else {
    echo "<p>No places found.</p>";
}
?>

</div> <!-- grid -->

        </div> <!-- container -->
    </div>
</div>

<?php include('includes/footer.php'); ?>