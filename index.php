<?php 
include('includes/db.php');
include('includes/navbar.php'); 
?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
/* Hero Section */
.hero {
    background: linear-gradient(135deg, rgba(30, 144, 255, 0.7) 0%, rgba(0, 188, 212, 0.7) 100%);
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    padding: 60px 20px;
    margin-bottom: 40px;
}

.hero h1 {
    font-size: 48px;
    margin: 0 0 10px 0;
}

.hero p {
    font-size: 20px;
    margin: 0;
    opacity: 0.9;
}

/* Feature Cards */
.feature-grid {
    max-width: 1100px;
    margin: auto;
    padding: 0 20px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.feature-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
    text-decoration: none;
    color: #222;
    display: flex;
    flex-direction: column;
}

.feature-card-image {
    width: 100%;
    height: 150px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.feature-card-content {
    padding: 30px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.feature-card-content h3 {
    margin: 0 0 10px 0;
    font-size: 22px;
}

.feature-card-content p {
    margin: 0 0 20px 0;
    color: #555;
    font-size: 14px;
    flex: 1;
}

.feature-card-content .btn {
    display: inline-block;
    padding: 10px 20px;
    background: #1e90ff;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    align-self: flex-start;
}

/* Top Places Section */
.section-title {
    max-width: 1100px;
    margin: 40px auto 20px;
    padding: 0 20px;
    font-size: 28px;
}

.container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}
</style>

<!-- Hero Section -->
<div class="page-background page-home" style="background: url('assets/images/backgrounds/home.jpg') no-repeat center center fixed; background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="hero">
            <h1 class="page-title">Welcome to Travel Guide</h1>
            <p>Explore the world's most beautiful countries, places, and travel tips</p>
        </div>

        <!-- Feature Cards -->
        <div class="feature-grid">
    <a href="countries.php" class="feature-card">
        <div class="feature-card-image" style="background-image: url('assets/images/icons/countries.png');"></div>
        <div class="feature-card-content">
            <h3>Countries</h3>
            <p>Discover countries from around the world</p>
            <div class="btn">Explore</div>
        </div>
    </a>

    <a href="places.php" class="feature-card">
        <div class="feature-card-image" style="background-image: url('assets/images/icons/places.png');"></div>
        <div class="feature-card-content">
            <h3>Places</h3>
            <p>Browse amazing tourist destinations</p>
            <div class="btn">View All</div>
        </div>
    </a>

    <a href="blog.php" class="feature-card">
        <div class="feature-card-image" style="background-image: url('assets/images/icons/blog.png');"></div>
        <div class="feature-card-content">
            <h3>Blog</h3>
            <p>Read travel stories and guides</p>
            <div class="btn">Read More</div>
        </div>
    </a>

    <a href="tips.php" class="feature-card">
        <div class="feature-card-image" style="background-image: url('assets/images/icons/tips.png');"></div>
        <div class="feature-card-content">
            <h3>Travel Tips</h3>
            <p>Get helpful travel advice</p>
            <div class="btn">Learn</div>
        </div>
    </a>
</div>

<!-- Top Places Preview -->
<div class="title-container">
    <h2 class="page-title">⭐ Top Rated Places</h2>
</div>

<div class="container">
<div class="grid">

<?php
$sql = "SELECT * FROM places ORDER BY name LIMIT 6";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (!empty($row['image']) && file_exists(__DIR__ . '/assets/images/' . $row['image'])) {
            $img = 'assets/images/' . $row['image'];
        } else {
            $img = 'assets/images/places/default.jpg';
        }
?>

    <div class="card">
        <img src="<?php echo $img; ?>">
        <div class="card-body">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo substr($row['description'], 0, 70); ?>...</p>
            <a class="btn" href="place-details.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
    </div>

<?php
    }
}
?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>