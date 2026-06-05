<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Blog - Explore Destinations</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/blog.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-plane-departure text-primary"></i> Travel Guide
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="places.php">Places</a></li>
                    <li class="nav-item"><a class="nav-link" href="tips.php">Tips</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Travel Blog</h1>
            <p class="hero-subtitle">Discover amazing stories from around the world</p>
            <a href="#blog-section" class="btn btn-light btn-lg mt-3">
                <i class="fas fa-arrow-down"></i> Explore Stories
            </a>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog-section" class="blog-section py-5">
        <div class="container-lg">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Latest Travel Stories</h2>
                <p class="section-subtitle">Inspiring tales from our global community of travelers</p>
            </div>

            <!-- Blog Grid -->
            <div class="row g-4">
                <!-- Blog Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=500&h=300&fit=crop" alt="Tokyo Adventure" class="blog-image">
                            <span class="badge-category">Asia</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-meta">
                                <span class="blog-date"><i class="far fa-calendar"></i> May 15, 2024</span>
                                <span class="blog-author"><i class="fas fa-user"></i> John Travel</span>
                            </div>
                            <h5 class="blog-title">Exploring the Vibrant Streets of Tokyo</h5>
                            <p class="blog-description">Discover the perfect blend of ancient traditions and futuristic innovation in Japan's bustling capital. From serene temples to neon-lit streets, Tokyo offers unforgettable experiences.</p>
                            <a href="blog-details.php?id=1" class="btn btn-primary read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=300&fit=crop" alt="Paris Romance" class="blog-image">
                            <span class="badge-category">Europe</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-meta">
                                <span class="blog-date"><i class="far fa-calendar"></i> May 10, 2024</span>
                                <span class="blog-author"><i class="fas fa-user"></i> Sarah Globe</span>
                            </div>
                            <h5 class="blog-title">Paris: The City of Love and Light</h5>
                            <p class="blog-description">Experience the romance and elegance of Paris. From the iconic Eiffel Tower to charming cafés and world-class museums, this city is a dream destination for every traveler.</p>
                            <a href="blog-details.php?id=2" class="btn btn-primary read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=500&h=300&fit=crop" alt="New York City" class="blog-image">
                            <span class="badge-category">North America</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-meta">
                                <span class="blog-date"><i class="far fa-calendar"></i> May 5, 2024</span>
                                <span class="blog-author"><i class="fas fa-user"></i> Mike Adventure</span>
                            </div>
                            <h5 class="blog-title">New York: The City That Never Sleeps</h5>
                            <p class="blog-description">Dive into the energy and excitement of New York City. Explore iconic landmarks, world-renowned restaurants, Broadway shows, and the vibrant neighborhoods that make NYC truly unforgettable.</p>
                            <a href="blog-details.php?id=3" class="btn btn-primary read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Blog Card 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop" alt="Barcelona Beach" class="blog-image">
                            <span class="badge-category">Europe</span>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-meta">
                                <span class="blog-date"><i class="far fa-calendar"></i> April 28, 2024</span>
                                <span class="blog-author"><i class="fas fa-user"></i> Emma Explorer</span>
                            </div>
                            <h5 class="blog-title">Barcelona: Art, Beach & Culture</h5>
                            <p class="blog-description">Immerse yourself in Barcelona's unique blend of architecture, art, and beach vibes. From Gaudí's masterpieces to Mediterranean beaches, this city captivates every visitor.</p>
                            <a href="blog-details.php?id=4" class="btn btn-primary read-more-btn">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="text-center mt-5">
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container-lg text-center">
            <h3 class="newsletter-title">Subscribe to Our Newsletter</h3>
            <p class="newsletter-subtitle">Get travel tips, stories, and deals delivered to your inbox</p>
            <form class="newsletter-form">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Travel Guide</h5>
                    <p>Your ultimate companion for exploring the world and discovering amazing destinations.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white-50">Home</a></li>
                        <li><a href="places.php" class="text-white-50">Places</a></li>
                        <li><a href="tips.php" class="text-white-50">Travel Tips</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-white-50"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-white-50">
            <div class="text-center text-white-50">
                <p>&copy; 2024 Travel Guide. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>