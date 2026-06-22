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
    /* Glassmorphism: 70% White + 30% Purple */
    background: rgba(216, 196, 250, 0.6);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(216, 196, 250, 0.4);
    border-radius: 14px;
    overflow: hidden;
    text-align: center;
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 
        0 4px 20px rgba(124, 58, 237, 0.08), 
        inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
    display: flex;
    flex-direction: column;
}

.nav-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.nav-card > div:not(.card-icon) {
    padding: 30px;
}

.nav-card:hover {
    transform: translateY(-10px);
    background: rgba(216, 196, 250, 0.75);
    box-shadow: 
        0 12px 28px rgba(124, 58, 237, 0.15), 
        inset 0 1px 0 0 rgba(255, 255, 255, 0.9);
}

.nav-card:hover img {
    transform: scale(1.04);
}

.card-icon {
    width: 100%;
    height: 200px;
    display: block;
    object-fit: cover;
}

.nav-card h2 {
    font-size: clamp(1.3rem, 4vw, 1.5rem);
    color: #5b21b6;
    margin: 20px 0 10px 0;
    font-weight: 700;
}

.nav-card p {
    color: #6b7280;
    margin-bottom: 20px;
    line-height: 1.6;
    flex-grow: 1;
    font-size: 0.95rem;
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
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(124, 58, 237, 0.5);
}

.btn-primary:active {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(124, 58, 237, 0.3);
}

.btn-secondary {
    background-color: rgba(255, 255, 255, 0.9);
    color: #7c3aed;
    border: 2px solid #7c3aed;
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(124, 58, 237, 0.4);
    border-color: #6d28d9;
}

.btn-secondary:active {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(124, 58, 237, 0.2);
}

.featured-section {
    /* Glassmorphism: 70% White + 30% Purple Gradient */
    background: linear-gradient(135deg, rgba(216, 196, 250, 0.65) 0%, rgba(230, 220, 250, 0.5) 100%);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(216, 196, 250, 0.4);
    text-align: center;
    padding: 50px 40px;
    border-radius: 14px;
    box-shadow: 
        0 4px 20px rgba(124, 58, 237, 0.08), 
        inset 0 1px 0 0 rgba(255, 255, 255, 0.8);
    transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.featured-section:hover {
    background: linear-gradient(135deg, rgba(216, 196, 250, 0.92) 0%, rgba(230, 220, 250, 0.82) 100%);
    box-shadow: 
        0 20px 40px rgba(124, 58, 237, 0.25),
        0 0 35px rgba(167, 139, 250, 0.35),
        inset 0 1px 0 0 rgba(255, 255, 255, 0.95);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.featured-section h2 {
    font-size: clamp(1.8rem, 5vw, 2.5rem);
    color: #5b21b6;
    margin-bottom: 10px;
    font-weight: 800;
}

.featured-section p {
    color: #6b7280;
    margin-bottom: 30px;
    font-size: 1.05rem;
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