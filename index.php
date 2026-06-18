<?php 
include('includes/db.php');
include('includes/navbar.php'); ?>

<div class="index-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Travel Guide</h1>
            <p>Discover the world's most beautiful destinations, hidden gems, and travel tips from our community.</p>
        </div>
    </section>

    <!-- Main Navigation Cards -->
    <section class="navigation-section">
        <div class="nav-cards-grid">
            <!-- Countries Card -->
            <div class="nav-card">
                <img src="assets/images/icons/countries.png" alt="Countries" class="card-icon">
                <h2>Countries</h2>
                <p>Explore information about countries around the world.</p>
                <a href="countries.php" class="btn btn-primary">Browse Countries</a>
            </div>

            <!-- Places Card -->
            <div class="nav-card">
                <img src="assets/images/icons/places.png" alt="Places" class="card-icon">
                <h2>Places</h2>
                <p>Discover amazing places and tourist attractions to visit.</p>
                <a href="places.php" class="btn btn-primary">Explore Places</a>
            </div>

            <!-- Blog Card -->
            <div class="nav-card">
                <img src="assets/images/icons/blog.png" alt="Blog" class="card-icon">
                <h2>Travel Blogs</h2>
                <p>Read travel stories, guides, and experiences from travelers.</p>
                <a href="blog.php" class="btn btn-primary">Read Blogs</a>
            </div>

            <!-- Tips Card -->
            <div class="nav-card">
                <img src="assets/images/icons/tips.png" alt="Tips" class="card-icon">
                <h2>Travel Tips</h2>
                <p>Get useful tips and advice for your travel adventures.</p>
                <a href="tips.php" class="btn btn-primary">View Tips</a>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="featured-section">
        <h2>Featured Destinations</h2>
        <p>Check out some of the most visited and recommended places</p>
        <a href="places.php" class="btn btn-secondary">See All Destinations</a>
    </section>
</div>

<style>

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('assets/images/backgrounds/home.jpg');
    background-size: cover;
    background-attachment: fixed;
    color: #333;
}
.index-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.hero-section {
    text-align: center;
    padding: 60px 20px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.7) 0%, rgba(118, 75, 162, 0.7) 100%), url('assets/images/backgrounds/home.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    border-radius: 10px;
    margin-bottom: 50px;
}

.hero-section h1 {
    font-size: 48px;
    margin-bottom: 20px;
    font-weight: bold;
}

.hero-section p {
    font-size: 20px;
    margin: 0;
    opacity: 0.9;
}

.navigation-section {
    margin-bottom: 50px;
}

.nav-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.nav-card {
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
}

.nav-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.nav-card > div:not(.card-icon) {
    padding: 30px;
}

.nav-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.card-icon {
    width: 100%;
    height: 200px;
    display: block;
    object-fit: cover;
}

.nav-card h2 {
    font-size: 24px;
    color: #333;
    margin: 20px 0 10px 0;
}

.nav-card p {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
    flex-grow: 1;
}

.btn {
    display: inline-block;
    padding: 12px 28px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    font-size: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 0 auto 15px;
}

.btn-primary {
    background-color: #667eea;
    color: white;
}

.btn-primary:hover {
    background-color: #5568d3;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
}

.btn-primary:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.btn-secondary {
    background-color: #f0f0f0;
    color: #333;
    border: 2px solid #667eea;
}

.btn-secondary:hover {
    background-color: #667eea;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(102, 126, 234, 0.4);
}

.btn-secondary:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.featured-section {
    text-align: center;
    padding: 40px;
    background-color: #f9f9f9;
    border-radius: 10px;
}

.featured-section h2 {
    font-size: 32px;
    color: #333;
    margin-bottom: 10px;
}

.featured-section p {
    color: #666;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 32px;
    }
    
    .hero-section p {
        font-size: 16px;
    }
    
    .nav-cards-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include('includes/footer.php'); ?>