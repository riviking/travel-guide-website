<?php
include('includes/db.php');
include('includes/navbar.php');

$country_id = $_GET['id'] ?? 0;

if ($country_id == 0) {
    die("Country ID missing in URL");
}

// Get country details
$country_sql = "SELECT * FROM countries WHERE id = $country_id";
$country = $conn->query($country_sql)->fetch_assoc();
?>

<h1 style="padding:20px;">
    Places in <?php echo $country['name']; ?>
</h1>

<div class="grid">

<?php
$sql = "SELECT * FROM places WHERE country_id = $country_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $img_sql = "SELECT image_url FROM place_images WHERE place_id = {$row['id']} LIMIT 1";
        $img_result = $conn->query($img_sql);
        $img = $img_result->fetch_assoc();
?>

    <div class="card">

        <img src="assets/images/<?php echo $img['image_url'] ?? 'default.jpg'; ?>" 
             style="width:100%; height:150px; object-fit:cover; border-radius:10px;">

        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['location']; ?></p>
        <p><?php echo substr($row['description'], 0, 80); ?>...</p>

        <a href="place-details.php?id=<?php echo $row['id']; ?>">
            View Details
        </a>

    </div>

<?php
    }
} else {
    echo "<p style='padding:20px;'>No places found in this country.</p>";
}
?>

</div>

<?php include('includes/footer.php'); ?>