<?php
include('includes/db.php');
include('includes/navbar.php');

$country_id = $_GET['id'] ?? 0;

if ($country_id == 0) {
    die("Country ID missing in URL");
}

// Get country details
$country_sql = "SELECT * FROM countries WHERE id = ?";
$stmt = $conn->prepare($country_sql);
$stmt->bind_param("i", $country_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Country not found.");
}

$country = $result->fetch_assoc();
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="container">

<h1>Places in <?php echo $country['name']; ?></h1>

<div class="grid">

<?php
$sql = "SELECT * FROM places WHERE country_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $country_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        // Use place image from DB or fall back to country image
        if (!empty($row['image']) && file_exists(__DIR__ . '/assets/images/' . $row['image'])) {
            $place_img = 'assets/images/' . $row['image'];
        } else {
            $place_img = 'assets/images/' . ($country['image'] ?? 'countries/sri_lanka.jpg');
        }
?>

    <div class="card">

        <img src="<?php echo $place_img; ?>">

        <div class="card-body">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo substr($row['description'], 0, 80); ?>...</p>

            <a class="btn" href="place-details.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>

    </div>

<?php
    }
} else {
    echo "<p style='padding:20px;'>No places found in this country.</p>";
}
?>

</div> <!-- .grid -->

</div> <!-- .container -->

<?php include('includes/footer.php'); ?>