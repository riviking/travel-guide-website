<?php
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<style>
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
                    <input type="text" id="countrySearch" placeholder="Search countries..." autocomplete="off">
                    <button class="clear-btn" id="clearCountrySearch" title="Clear search">✕</button>
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

        <img src="<?php 
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

            <p class="no-results" id="noCountryResults" style="display: none; text-align: center; padding: 20px; font-size: 18px; color: #666;">😕 No countries found matching your search.</p>
        </div> <!-- .container -->
    </div>
</div>

<script>
// Country Search Functionality
const countrySearchInput = document.getElementById('countrySearch');
const clearCountryBtn = document.getElementById('clearCountrySearch');
const countryCards = document.querySelectorAll('#countriesGrid .card');
const noCountryResults = document.getElementById('noCountryResults');

countrySearchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    let visibleCount = 0;

    countryCards.forEach(card => {
        const name = card.getAttribute('data-name');
        if (name.includes(query)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide "no results" message
    noCountryResults.style.display = visibleCount === 0 ? 'block' : 'none';

    // Show/hide clear button
    clearCountryBtn.style.display = query.length > 0 ? 'inline' : 'none';
});

clearCountryBtn.addEventListener('click', function () {
    countrySearchInput.value = '';
    countrySearchInput.dispatchEvent(new Event('input'));
    countrySearchInput.focus();
});
</script>

<?php include('includes/footer.php'); ?>