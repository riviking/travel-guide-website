<?php
include('includes/db.php');
include('includes/navbar.php');

$place_id = intval($_GET['id'] ?? 0);

// Fetch place + details
$sql = "SELECT p.*, 
               d.long_description, 
               d.history, 
               d.best_time_to_visit, 
               d.entry_fee, 
               d.map_link
        FROM places p
        LEFT JOIN place_details d ON p.id = d.place_id
        WHERE p.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $place_id);
$stmt->execute();
$result = $stmt->get_result();

$place = $result->fetch_assoc();

if (!$place) {
    echo "<h2 style='text-align:center;margin-top:50px;'>Place not found</h2>";
    include('includes/footer.php');
    exit;
}

// Background image
$bgImage = !empty($place['image'])
    ? 'assets/images/' . $place['image']
    : 'assets/images/places/default.jpg';
?>


<style>
.place-page {
    min-height: 100vh;
    width: 100%;
    position: relative;
    background-image: url('<?php echo $bgImage; ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* DARK OVERLAY */
.place-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.55);
    z-index: 0;
}

/* CONTENT WRAPPER */
.place-hero,
.place-content {
    position: relative;
    z-index: 1;
    color: #fff;
}

/* HERO */
.place-hero {
    padding: 60px 40px 20px;
    max-width: 1100px;
    margin: auto;
}

.place-hero h1 {
    font-size: 50px;
    margin-bottom: 10px;
}

.place-hero p {
    font-size: 18px;
    max-width: 700px;
    opacity: 0.9;
}

/* CONTENT */
.place-content {
    padding: 30px 40px 60px;
    max-width: 1100px;
    margin: auto;
}

/* SECTIONS */
.section {
    background: rgba(255,255,255,0.12);
    padding: 20px;
    margin-bottom: 20px;
    margin-top: 20px;
    border-radius: 14px;
    backdrop-filter: blur(10px);
}

/* INFO BOX */
.info-box {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.info-item {
    flex: 1;
    background: rgba(255,255,255,0.12);
    padding: 20px;
    border-radius: 14px;
    text-align: center;
    backdrop-filter: blur(10px);
}

/* MAP BUTTON */
.map-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background: #00b7ff;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
}

.map-btn:hover {
    background: #0095cc;
}

.place-image {
    width: 100%;
    border-radius: 12px;
    margin-bottom: 20px;
}
</style>

<div class="place-page">

    <!-- HERO -->
    <div class="place-hero">
        
        <h1><?php echo htmlspecialchars($place['name']); ?></h1>
        <p><?php echo htmlspecialchars($place['description']); ?></p>
    </div>


    <!-- CONTENT -->
    <div class="place-content">

        <!-- OVERVIEW -->
        <div class="section">
            <h2>📖 Overview</h2>
            <p>
                <?php echo nl2br(htmlspecialchars($place['long_description'] ?? 'No overview available.')); ?>
            </p>
        </div>

        <!-- HISTORY -->
        <div class="section">
            <h2>🏛 History</h2>
            <p>
                <?php echo nl2br(htmlspecialchars($place['history'] ?? 'No history available.')); ?>
            </p>
        </div>

        <!-- INFO BOX -->
        <div class="info-box">

            <div class="info-item">
                <h3>⏰ Best Time</h3>
                <p><?php echo htmlspecialchars($place['best_time_to_visit'] ?? 'N/A'); ?></p>
            </div>

            <div class="info-item">
                <h3>🎟 Entry Fee</h3>
                <p><?php echo htmlspecialchars($place['entry_fee'] ?? 'N/A'); ?></p>
            </div>

        </div>

        <!-- MAP -->
        <?php if (!empty($place['map_link'])) { ?>
        <div class="section">
            <h2>📍 Location</h2>
            <a class="map-btn" target="_blank"
               href="<?php echo htmlspecialchars($place['map_link']); ?>">
                View on Google Maps
            </a>
        </div>

        

        <?php } ?>

    </div>
</div>

<?php include('includes/footer.php'); ?>