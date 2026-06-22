<?php
// Don't output any HTML here - let individual pages handle the HTML structure
// This file contains only CSS and the navbar HTML

// Note: Include this file AFTER all PHP logic and header() calls
require_once __DIR__ . '/auth.php';
$navBase = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'admin') ? '../' : '';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Inter:wght@300;400;500;600;700&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<style>
/* ===== GOOGLE FONTS & TYPOGRAPHY ===== */
:root {
    --font-primary: 'Poppins', sans-serif;
    --font-secondary: 'Inter', sans-serif;
}

body {
    font-family: var(--font-secondary);
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-primary);
}

/* ===== STICKY NAVBAR WRAPPER ===== */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: linear-gradient(135deg, #1e90ff 0%, #0077e6 100%);
    transition: box-shadow 0.25s ease, background 0.25s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* shadow on scroll */
.navbar.scrolled {
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}

/* container */
.navbar-inner {
    max-width: 1100px;
    margin: auto;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

/* logo */
.logo {
    font-size: 20px;
    font-weight: bold;
}

/* links */
.nav-links {
    display: flex;
    gap: 18px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: opacity 0.2s;
}

.nav-links a:hover {
    opacity: 0.8;
}

.nav-user-link {
    font-weight: 700;
}

/* hamburger */
.hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
}

.hamburger span {
    width: 25px;
    height: 3px;
    background: white;
    border-radius: 2px;
    transition: all 0.3s ease;
}

/* Dark Mode Toggle */
.dark-mode-toggle {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    transition: all 0.3s ease;
}

.dark-mode-toggle:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

/* Dark Mode Styles */
body.dark-mode {
    background-color: #1a1a1a;
    color: #e0e0e0;
}

body.dark-mode .navbar {
    background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 100%);
}

body.dark-mode .card {
    background: rgba(30, 30, 40, 0.85);
    border-color: rgba(100, 100, 150, 0.3);
}

body.dark-mode .card:hover {
    background: rgba(40, 40, 60, 0.95);
}

body.dark-mode .page-background {
    background-color: #1a1a1a;
}

body.dark-mode .page-title {
    color: #e0e0e0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
}

body.dark-mode .container,
body.dark-mode .card-body p,
body.dark-mode .card-body h3 {
    color: #e0e0e0;
}

body.dark-mode .bluish-section {
    background: linear-gradient(135deg, rgba(30, 90, 180, 0.8) 0%, rgba(0, 120, 180, 0.8) 100%);
}

/* ===== BREADCRUMB NAVIGATION ===== */
.breadcrumb {
    max-width: 1100px;
    margin: 20px auto 0;
    padding: 12px 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.breadcrumb a {
    color: #1e90ff;
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb a:hover {
    color: #0077e6;
}

.breadcrumb .separator {
    color: #999;
    margin: 0 4px;
}

.breadcrumb .current {
    color: #666;
    font-weight: 500;
}

/* ===== LOADING ANIMATIONS ===== */
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    border-radius: 8px;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.skeleton-card {
    height: 300px;
    margin-bottom: 20px;
}

.skeleton-text {
    height: 14px;
    margin-bottom: 10px;
}

.skeleton-title {
    height: 24px;
    margin-bottom: 15px;
}

/* Loading Spinner */
.spinner {
    border: 4px solid rgba(30, 144, 255, 0.2);
    border-top: 4px solid #1e90ff;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 0.8s linear infinite;
    margin: 40px auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Pulse Animation */
.pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}
.hamburger {
    display: none;
    font-size: 26px;
    cursor: pointer;
}

/* mobile */
@media (max-width: 768px) {
    .hamburger {
        display: block;
    }

    .nav-links {
        position: absolute;
        top: 60px;
        right: 0;
        background: #1e90ff;
        flex-direction: column;
        width: 200px;
        padding: 15px;
        display: none;
    }

    .nav-links.show {
        display: flex;
    }
}
</style>

<nav class="navbar" id="navbar">
    <div class="navbar-inner">
        <div class="logo"><i class="fas fa-globe"></i> Travel Guide</div>

        <div class="hamburger" onclick="toggleMenu()">☰</div>

        <div class="nav-links" id="navLinks">
            <a href="<?php echo $navBase; ?>index.php"><i class="fas fa-home"></i> Home</a>
            <a href="<?php echo $navBase; ?>countries.php"><i class="fas fa-flag"></i> Countries</a>
            <a href="<?php echo $navBase; ?>places.php"><i class="fas fa-map-location-dot"></i> Places</a>
            <a href="<?php echo $navBase; ?>blog.php"><i class="fas fa-pen-fancy"></i> Blog</a>
            <a href="<?php echo $navBase; ?>tips.php"><i class="fas fa-lightbulb"></i> Tips</a>
            <?php if (is_user_logged_in()): ?>
                <a class="nav-user-link" href="<?php echo $navBase; ?>profile.php"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars(current_user_name()); ?></a>
                <a href="<?php echo $navBase; ?>logout.php"><i class="fas fa-right-from-bracket"></i> Logout</a>
            <?php else: ?>
                <a href="<?php echo $navBase; ?>login.php"><i class="fas fa-right-to-bracket"></i> Login</a>
                <a href="<?php echo $navBase; ?>register.php"><i class="fas fa-user-plus"></i> Register</a>
            <?php endif; ?>
            <a href="<?php echo $navBase; ?>admin/admin-login.php"><i class="fas fa-lock"></i> Admin</a>
            <button class="dark-mode-toggle" id="darkModeToggle" title="Toggle Dark Mode">
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </div>
</nav>

<script>
function toggleMenu() {
    document.getElementById("navLinks").classList.toggle("show");
}

/* sticky shadow effect */
window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");

    if (window.scrollY > 5) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

/* Dark Mode Toggle */
const darkModeToggle = document.getElementById('darkModeToggle');
const htmlElement = document.documentElement;

// Load dark mode preference
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    updateDarkModeIcon();
}

darkModeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
        updateDarkModeIcon();
    } else {
        localStorage.setItem('darkMode', 'disabled');
        updateDarkModeIcon();
    }
});

function updateDarkModeIcon() {
    const icon = darkModeToggle.querySelector('i');
    if (document.body.classList.contains('dark-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
}
</script>
