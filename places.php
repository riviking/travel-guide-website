<?php 
include('includes/db.php');
include('includes/auth.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-places" style="background-image: url('assets/images/backgrounds/places.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="breadcrumb" style="margin: 0 auto;">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <span class="separator">/</span>
        <span class="current"><i class="fas fa-map-location-dot"></i> Places</span>
    </div>
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title"><i class="fas fa-map-marked-alt"></i> Places</h1>
        </div>

        

<style>
body.dark-mode .page-places {
    background-color: rgba(4, 12, 20, 0.54);
    background-blend-mode: multiply;
}

.page-places .breadcrumb {
    background: rgba(255, 255, 255, 0.22);
    border: 1px solid rgba(255, 255, 255, 0.18);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.page-places .breadcrumb .current {
    color: #475569;
}

body.dark-mode .page-places .breadcrumb {
    background: rgba(15, 23, 42, 0.42);
    border-color: rgba(148, 163, 184, 0.22);
}

body.dark-mode .page-places .breadcrumb .current,
body.dark-mode .page-places .breadcrumb .separator {
    color: #cbd5e1;
}

.page-places .page-title {
    color: #ffffff;
    text-shadow: 0 4px 16px rgba(15, 23, 42, 0.58);
}

/* Place Cards: 75% White + 25% Blue */
.page-places .card {
    background: rgba(255, 255, 255, 0.88);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(15, 23, 42, 0.1);
    box-shadow: 
        0 14px 34px rgba(15, 23, 42, 0.18), 
        inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
    transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), background 0.4s ease, box-shadow 0.4s ease;
}

.page-places .card:hover {
    transform: translateY(-8px);
    background: rgba(255, 255, 255, 0.96);
    box-shadow: 
        0 22px 44px rgba(15, 23, 42, 0.24),
        0 0 30px rgba(30, 144, 255, 0.18),
        inset 0 1px 0 0 rgba(255, 255, 255, 0.95);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.page-places .card-body h3 {
    color: #0f172a;
}

.page-places .card-body p {
    color: #475569;
}

body.dark-mode .page-places .card {
    background: #111827;
    border-color: #263244;
    box-shadow: 0 18px 44px rgba(0, 0, 0, 0.48);
}

body.dark-mode .page-places .card:hover {
    background: #162033;
    border-color: #3b82f6;
    box-shadow: 0 24px 54px rgba(0, 0, 0, 0.6);
}

body.dark-mode .page-places .card-body h3 {
    color: #f8fafc;
}

body.dark-mode .page-places .card-body p {
    color: #dbe4ef;
}

.page-places .card:hover img {
    transform: scale(1.07);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.page-places .details-btn {
    background: linear-gradient(135deg, #1e90ff 0%, #0077e6 100%);
    box-shadow: 0 2px 6px rgba(30, 144, 255, 0.3);
    transition: all 0.2s ease;
}

.page-places .details-btn:hover {
    background: linear-gradient(135deg, #0077e6 0%, #005cc2 100%);
    box-shadow: 0 4px 12px rgba(30, 144, 255, 0.45);
    transform: translateY(-2px);
}

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

/* SEARCH BAR */
.search-wrapper {
    max-width: 1100px;
    margin: 0 auto 24px;
    padding: 0 20px;
}

.search-bar {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.55);
    border-radius: 50px;
    padding: 10px 20px;
    gap: 10px;
}

.search-bar input {
    flex: 1;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #0f172a;
}

.search-bar input::placeholder {
    color: rgba(15, 23, 42, 0.65);
}

.search-bar .search-icon svg {
    fill: rgba(15, 23, 42, 0.72);
    display: block;
}

.search-bar .clear-btn {
    background: none;
    border: none;
    color: rgba(15, 23, 42, 0.7);
    font-size: 18px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    display: none;
}

.search-bar .clear-btn:hover {
    color: #0f172a;
}

body.dark-mode .page-places .search-bar {
    background: rgba(15, 23, 42, 0.42);
    border-color: rgba(226, 232, 240, 0.34);
}

body.dark-mode .page-places .search-bar input {
    color: #f8fafc;
}

body.dark-mode .page-places .search-bar input::placeholder {
    color: rgba(248, 250, 252, 0.76);
}

body.dark-mode .page-places .search-bar .search-icon svg {
    fill: rgba(248, 250, 252, 0.82);
}

body.dark-mode .page-places .search-bar .clear-btn {
    color: rgba(248, 250, 252, 0.76);
}

body.dark-mode .page-places .search-bar .clear-btn:hover {
    color: #ffffff;
}

.no-results {
    text-align: center;
    color: #fff;
    font-size: 18px;
    padding: 40px 0;
    display: none;
    width: 100%;
}
</style>

<div class="container">

    <!-- SEARCH BAR -->
    <div class="search-wrapper">
        <div class="search-bar">
            <span class="search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">
                    <g><path d="M12.2 13.6a7 7 0 111.4-1.4l5.4 5.4-1.4 1.4zM3 8a5 5 0 1010 0A5 5 0 003 8"></path></g>
                </svg>
            </span>
            <input type="text" id="placeSearch" data-search-input data-search-grid="#placesGrid" data-search-clear="#clearSearch" data-search-empty="#noResults" placeholder="Search places..." autocomplete="off">
            <button class="clear-btn" id="clearSearch" title="Clear search">x</button>
        </div>
    </div>

    <!-- Places Grid -->
    <div class="grid" id="placesGrid">

    <?php
    $sql = "SELECT * FROM places ORDER BY name";
    $result = $conn->query($sql);
    if (!$result) {
        die("Database error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageName = $row['image'];
            // Remove 'places/thumbs/' prefix if it exists in DB
            $imageName = str_replace('places/thumbs/', '', $imageName);
            $imageName = str_replace('places/', '', $imageName);
            // Construct the path
            $img = 'assets/images/places/' . $imageName;
    ?>

        <div class="card" data-name="<?php echo strtolower(htmlspecialchars($row['name'])); ?>">
            <img src="<?php echo $img; ?>" loading="lazy">
            <div class="card-body">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description'] ?? 'Unknown'); ?></p>
                <div class="rating">
                    <i class="fas fa-star"></i> <?php echo (!empty($row['rating'])) ? htmlspecialchars($row['rating']) : 'N/A'; ?>/5.0
                </div>
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

    <p class="no-results" id="noResults">No places found matching your search.</p>

</div> <!-- container -->

    </div>
</div>

<?php include('includes/footer.php'); ?>
