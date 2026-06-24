<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
/* Country Cards: 75% White + 25% Purple */
.page-countries .card {
    background: rgba(216, 196, 250, 0.4);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(216, 196, 250, 0.3);
    box-shadow: 
        0 4px 20px rgba(124, 58, 237, 0.06), 
        inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
    transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), background 0.4s ease, box-shadow 0.4s ease;
}

.page-countries .card:hover {
    transform: translateY(-8px);
    background: rgba(216, 196, 250, 0.75);
    box-shadow: 
        0 20px 40px rgba(124, 58, 237, 0.22),
        0 0 30px rgba(167, 139, 250, 0.3),
        inset 0 1px 0 0 rgba(255, 255, 255, 0.95);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.page-countries .card:hover img {
    transform: scale(1.07);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.page-countries .btn {
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    box-shadow: 0 2px 6px rgba(124, 58, 237, 0.3);
}

.page-countries .btn:hover {
    background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.45);
}

.page-countries .breadcrumb {
    background: rgba(255, 255, 255, 0.34);
    border: 1px solid rgba(255, 255, 255, 0.32);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.page-countries .breadcrumb .current,
.page-countries .breadcrumb .separator {
    color: #1f2937;
    font-weight: 700;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.55);
}

body.dark-mode .page-countries {
    background-color: rgba(6, 8, 22, 0.58);
    background-blend-mode: multiply;
}

body.dark-mode .page-countries .breadcrumb {
    background: rgba(15, 23, 42, 0.42);
    border-color: rgba(148, 163, 184, 0.22);
}

body.dark-mode .page-countries .breadcrumb .current,
body.dark-mode .page-countries .breadcrumb .separator {
    color: #cbd5e1;
}

body.dark-mode .page-countries .card {
    background: #111827;
    border-color: #312e81;
    box-shadow: 0 18px 44px rgba(0, 0, 0, 0.48);
}

body.dark-mode .page-countries .card:hover {
    background: #17172b;
    border-color: #7c3aed;
    box-shadow: 0 24px 54px rgba(0, 0, 0, 0.6);
}

body.dark-mode .page-countries .card-body h3 {
    color: #f8fafc;
}

body.dark-mode .page-countries .card-body p {
    color: #dbe4ef;
}

body.dark-mode .page-countries .search-bar {
    background: rgba(15, 23, 42, 0.42);
    border-color: rgba(226, 232, 240, 0.34);
}

body.dark-mode .page-countries .search-bar input {
    color: #f8fafc;
}

body.dark-mode .page-countries .search-bar input::placeholder {
    color: rgba(248, 250, 252, 0.76);
}

body.dark-mode .page-countries .search-bar .search-icon svg {
    fill: rgba(248, 250, 252, 0.82);
}

body.dark-mode .page-countries .search-bar .clear-btn {
    color: rgba(248, 250, 252, 0.76);
}

.search-wrapper {
    max-width: 1100px;
    margin: 0 auto 24px;
    padding: 0 20px;
}

.search-bar {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
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
    color: #fff;
}

.search-bar input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-bar .search-icon svg {
    fill: #fff;
}

.search-bar .clear-btn {
    background: transparent;
    border: none;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    padding: 0;
    display: none;
}

.search-bar .clear-btn:hover {
    opacity: 0.7;
}

.no-results {
    display: none;
    width: 100%;
}
</style>

<div class="page-background page-countries" style="background-image: url('assets/images/backgrounds/countries.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="breadcrumb" style="margin: 0 auto;">
        <a href="index.php"><i class="fas fa-home"></i> Home</a>
        <span class="separator">/</span>
        <span class="current"><i class="fas fa-flag"></i> Countries</span>
    </div>
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">Countries</h1>
        </div>

        

        <div class="container">
            <!-- SEARCH BAR -->
            <div class="search-wrapper">
                <div class="search-bar">
                    <span class="search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">
                            <g><path d="M12.2 13.6a7 7 0 111.4-1.4l5.4 5.4-1.4 1.4zM3 8a5 5 0 1010 0A5 5 0 003 8"></path></g>
                        </svg>
                    </span>
                    <input type="text" id="countrySearch" data-search-input data-search-grid="#countriesGrid" data-search-clear="#clearCountrySearch" data-search-empty="#noCountryResults" placeholder="Search countries..." autocomplete="off">
                    <button class="clear-btn" id="clearCountrySearch" title="Clear search">x</button>
                </div>
            </div>

            <div class="grid" id="countriesGrid">

<?php
$sql = "SELECT * FROM countries";
$result = $conn->query($sql);

if (!$result) {
    die("Database error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <div class="card" data-name="<?php echo strtolower(htmlspecialchars($row['name'])); ?>">

        <img loading="lazy" src="<?php 
            $img = $row['image'] ?? 'default.jpg';
            $img = str_replace('countries/', '', $img);
            echo 'assets/images/countries/' . $img; 
        ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">

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

            </div> <!-- .grid -->

            <p class="no-results" id="noCountryResults" style="display: none; text-align: center; padding: 20px; font-size: 18px; color: #666;">No countries found matching your search.</p>
        </div> <!-- .container -->
    </div>
</div>

<?php include('includes/footer.php'); ?>
