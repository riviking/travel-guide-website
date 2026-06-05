<?php
include('includes/db.php');
include('includes/navbar.php');

$place_id = (int)($_GET['id'] ?? 0);

if ($place_id === 0) {
    die("Place ID missing in URL");
}

$sql = "SELECT * FROM places WHERE id = $place_id";
$place = $conn->query($sql)->fetch_assoc();

if (!$place) {
    die("Place not found");
}

// Background image
$bgImage = !empty($place['image'])
    ? 'assets/images/' . $place['image']
    : 'assets/images/default.jpg';
?>

<style>
.place-hero {
    height: 360px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: flex-end;
    color: white;
}

.place-hero .overlay {
    width: 100%;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    padding: 30px 20px;
}

.place-hero h1 {
    max-width: 1100px;
    margin: auto;
    font-size: 34px;
}

.place-content {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

.place-content p {
    font-size: 16px;
    color: #444;
    line-height: 1.6;
}

.back-link {
    display: inline-block;
    margin-top: 20px;
    padding: 8px 12px;
    background: #1e90ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}
</style>

<div class="place-hero" style="background-image: url('<?php echo $bgImage; ?>');">
    <div class="overlay">
        <h1><?php echo $place['name']; ?></h1>
    </div>
</div>

<div class="place-content">
    <p><?php echo $place['description']; ?></p>

    <a class="back-link" href="country-view.php?id=<?php echo $place['country_id']; ?>">
        ← Back to Country
    </a>
</div>

<?php include('includes/footer.php'); ?>
