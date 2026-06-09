<?php 
include('includes/db.php');
include('includes/navbar.php');
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="page-background page-places" style="background-image: url('assets/images/backgrounds/places.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="main-content-wrapper">
        <div class="title-container">
            <h1 class="page-title">🗺️ Places</h1>
        </div>

        <div class="bluish-section"></div>

<style>
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
    fill: rgba(255, 255, 255, 0.8);
    display: block;
}

.search-bar .clear-btn {
    background: none;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    font-size: 18px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    display: none;
}

.search-bar .clear-btn:hover {
    color: #fff;
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
            <input type="text" id="placeSearch" placeholder="Search places..." autocomplete="off">
            <button class="clear-btn" id="clearSearch" title="Clear search">✕</button>
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
            if (!empty($row['image']) && file_exists(__DIR__ . '/assets/images/' . $row['image'])) {
                $img = 'assets/images/' . $row['image'];
            } else {
                $img = 'assets/images/places/default.jpg';
            }
    ?>

        <div class="card" data-name="<?php echo strtolower(htmlspecialchars($row['name'])); ?>">
            <img src="<?php echo $img; ?>" loading="lazy">
            <div class="card-body">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['category'] ?? 'Unknown'); ?></p>
                <div class="rating">
                    ⭐ <?php echo (!empty($row['rating'])) ? htmlspecialchars($row['rating']) : 'N/A'; ?>/5.0
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

    <p class="no-results" id="noResults">😕 No places found matching your search.</p>

</div> <!-- container -->

<script>
const searchInput = document.getElementById('placeSearch');
const clearBtn    = document.getElementById('clearSearch');
const cards       = document.querySelectorAll('#placesGrid .card');
const noResults   = document.getElementById('noResults');

searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    let visibleCount = 0;

    cards.forEach(card => {
        const name = card.getAttribute('data-name');
        if (name.includes(query)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide "no results" message
    noResults.style.display = visibleCount === 0 ? 'block' : 'none';

    // Show/hide clear button
    clearBtn.style.display = query.length > 0 ? 'inline' : 'none';
});

clearBtn.addEventListener('click', function () {
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
});
</script>

    </div>
</div>

<?php include('includes/footer.php'); ?>