<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
.rating {
    color: #ff9800;
    font-size: 16px;
    margin: 5px 0;
    font-weight: bold;
}

.card {
    position: relative;
}

.rating-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ff9800;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-weight: bold;
    font-size: 14px;
}
</style>

<div class="container">

<h1>⭐ Top Rated Places</h1>

<!-- Top places grid -->
<div class="grid">

<?php
$sql = "SELECT * FROM places ORDER BY rating DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Compute image path (DB stores like 'places/eiffel-tower.jpg')
        if (!empty($row['image']) && file_exists(__DIR__ . '/assets/images/' . $row['image'])) {
            $img = 'assets/images/' . $row['image'];
        } else {
            $img = 'assets/images/places/default.jpg';
        }

?>

    <div class="card">
        <div class="rating-badge">⭐ <?php echo $row['rating']; ?></div>
        
        <img src="<?php echo $img; ?>">

        <div class="card-body">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['category']; ?></p>
            <div class="rating">Rating: <?php echo $row['rating']; ?>/5.0</div>
            <p><?php echo substr($row['description'], 0, 100); ?>...</p>
            <a class="btn" href="place-details.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
    </div>

<?php
    }
} else {
    echo "<p>No places found.</p>";
}
?>

</div> <!-- .grid -->

</div> <!-- .container -->

<?php include('includes/footer.php'); ?>
