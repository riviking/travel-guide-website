<?php
include('includes/db.php');
include('includes/auth.php');
include('includes/navbar.php');

$place_id = intval($_GET['id'] ?? 0);

// Fetch place + details using JOIN
$sql = "SELECT p.*, pd.long_description, pd.history, pd.best_time_to_visit, pd.entry_fee, pd.map_link
        FROM places p
        LEFT JOIN place_details pd ON p.id = pd.place_id
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

$isSaved = false;
if (is_user_logged_in()) {
    $savedStmt = $conn->prepare('SELECT id FROM saved_places WHERE user_id = ? AND place_id = ? LIMIT 1');
    $userId = current_user_id();
    $savedStmt->bind_param('ii', $userId, $place_id);
    $savedStmt->execute();
    $isSaved = $savedStmt->get_result()->num_rows > 0;
}

// Background image
$imageName = $place['image'] ?? '';
// Strip the 'places/thumbs/' and 'places/' prefixes
$imageName = str_replace('places/thumbs/', '', $imageName);
$imageName = str_replace('places/', '', $imageName);
$bgImage = !empty($imageName) 
    ? 'assets/images/places/' . $imageName
    : 'assets/images/places/default.jpg';
?>
<link rel="stylesheet" href="assets/css/style.css">
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
<link rel="stylesheet" href="assets/css/account.css">

<div class="place-page">

    <!-- HERO -->
    <div class="place-hero">
        <h1><?php echo htmlspecialchars($place['name']); ?></h1>
        <p><?php echo htmlspecialchars($place['description']); ?></p>
        <?php if (is_user_logged_in()): ?>
            <form method="POST" action="save-place.php" class="save-place-form">
                <input type="hidden" name="place_id" value="<?php echo (int) $place['id']; ?>">
                <button type="submit" class="save-place-btn <?php echo $isSaved ? 'saved' : ''; ?>">
                    <i class="<?php echo $isSaved ? 'fas' : 'far'; ?> fa-bookmark"></i>
                    <?php echo $isSaved ? 'Saved to Profile' : 'Save Place'; ?>
                </button>
            </form>
        <?php else: ?>
            <p><a class="save-place-btn" href="login.php"><i class="fas fa-right-to-bracket"></i> Sign in to save this place</a></p>
        <?php endif; ?>
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
            <iframe
                src="https://maps.google.com/maps?q=<?php echo urlencode($place['name']); ?>&output=embed"
                width="100%"
                height="400"
                style="border: none; border-radius: 10px; margin-top: 10px; display: block;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <?php } ?>

    </div>
</div>

<?php include('includes/footer.php'); ?>
