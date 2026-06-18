<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-countries" style="background-image: url('assets/images/backgrounds/countries.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">Countries</h1>
        </div>

        

        <div class="container">
            <div class="grid">

<?php
$sql = "SELECT * FROM countries";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <div class="card">

        <img src="<?php echo 'assets/images/' . ($row['image'] ?? 'countries/sri_lanka.jpg'); ?>">

        <div class="card-body">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo substr($row['description'], 0, 80); ?>...</p>

            <a class="btn" href="country-view.php?id=<?php echo $row['id']; ?>">
                View Country
            </a>
        </div>

    </div>

<?php
    }
} else {
    echo "<p>No countries found.</p>";
}
?>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>