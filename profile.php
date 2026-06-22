<?php
include('includes/db.php');
include('includes/auth.php');
require_user_login();

$userId = current_user_id();
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $homeCountry = trim($_POST['home_country'] ?? '');
    $travelStyle = trim($_POST['travel_style'] ?? '');
    $dreamDestination = trim($_POST['dream_destination'] ?? '');

    if ($name === '') {
        $error = 'Name is required.';
    } else {
        $stmt = $conn->prepare('UPDATE users SET name = ?, bio = ?, home_country = ?, travel_style = ?, dream_destination = ? WHERE id = ?');
        $stmt->bind_param('sssssi', $name, $bio, $homeCountry, $travelStyle, $dreamDestination, $userId);

        if ($stmt->execute()) {
            $_SESSION['user_name'] = $name;
            $success = 'Profile updated successfully.';
        } else {
            $error = 'Could not update your profile.';
        }
    }
}

$stmt = $conn->prepare('SELECT name, email, bio, home_country, travel_style, dream_destination, created_at FROM users WHERE id = ?');
$stmt->bind_param('i', $userId);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$savedStmt = $conn->prepare(
    'SELECT sp.id AS saved_id, p.id, p.name, p.description, p.image
     FROM saved_places sp
     INNER JOIN places p ON p.id = sp.place_id
     WHERE sp.user_id = ?
     ORDER BY sp.created_at DESC'
);
$savedStmt->bind_param('i', $userId);
$savedStmt->execute();
$savedPlaces = $savedStmt->get_result();
$savedCount = $savedPlaces->num_rows;

include('includes/navbar.php');
?>
<link rel="stylesheet" href="assets/css/account.css">

<main class="account-page">
    <div class="account-shell">
        <section class="profile-hero">
            <div class="profile-avatar"><?php echo htmlspecialchars(user_initials($user['name'])); ?></div>
            <div>
                <h1><?php echo htmlspecialchars($user['name']); ?></h1>
                <p class="account-muted"><?php echo htmlspecialchars($user['email']); ?> · Member since <?php echo date('M Y', strtotime($user['created_at'])); ?></p>
            </div>
        </section>

        <?php if ($success): ?>
            <div class="alert success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="profile-grid">
            <section class="profile-panel">
                <h2>Saved Places</h2>
                <p class="account-muted">Your personal shortlist for future trips.</p>

                <div class="stats-grid">
                    <div class="stat-box">
                        <strong><?php echo $savedCount; ?></strong>
                        <span>Saved places</span>
                    </div>
                    <div class="stat-box">
                        <strong><?php echo htmlspecialchars($user['travel_style'] ?: 'Set'); ?></strong>
                        <span>Travel style</span>
                    </div>
                    <div class="stat-box">
                        <strong><?php echo htmlspecialchars($user['dream_destination'] ?: 'Plan'); ?></strong>
                        <span>Dream trip</span>
                    </div>
                </div>

                <?php if ($savedCount > 0): ?>
                    <div class="saved-grid">
                        <?php while ($place = $savedPlaces->fetch_assoc()):
                            $imageName = str_replace(['places/thumbs/', 'places/'], '', $place['image'] ?? '');
                            $img = $imageName ? 'assets/images/places/' . $imageName : 'assets/images/places/default.jpg';
                        ?>
                            <article class="saved-place-card">
                                <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($place['name']); ?>">
                                <div>
                                    <h3><?php echo htmlspecialchars($place['name']); ?></h3>
                                    <a href="place-details.php?id=<?php echo (int) $place['id']; ?>">View details</a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        No saved places yet. Explore destinations and use the save button on a place page.
                    </div>
                <?php endif; ?>
            </section>

            <section class="profile-panel">
                <h2>Edit Profile</h2>
                <p class="account-muted">Keep your travel preferences fresh.</p>
                <form method="POST" action="profile.php">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="home_country">Home country</label>
                        <input type="text" id="home_country" name="home_country" value="<?php echo htmlspecialchars($user['home_country'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="travel_style">Travel style</label>
                        <select id="travel_style" name="travel_style">
                            <?php
                            $styles = ['', 'Adventure', 'Culture', 'Relaxation', 'Food', 'Budget', 'Luxury'];
                            foreach ($styles as $style):
                                $label = $style === '' ? 'Choose a style' : $style;
                            ?>
                                <option value="<?php echo htmlspecialchars($style); ?>" <?php echo (($user['travel_style'] ?? '') === $style) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($label); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dream_destination">Dream destination</label>
                        <input type="text" id="dream_destination" name="dream_destination" value="<?php echo htmlspecialchars($user['dream_destination'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
                    </div>
                    <button class="account-btn" type="submit"><i class="fas fa-floppy-disk"></i> Save Profile</button>
                </form>
            </section>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
