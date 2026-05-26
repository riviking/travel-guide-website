<style>
/* ===== STICKY NAVBAR WRAPPER ===== */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #1e90ff;
    transition: box-shadow 0.25s ease, background 0.25s ease;
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

/* hamburger */
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
        <div class="logo">🌍 Travel Guide</div>

        <div class="hamburger" onclick="toggleMenu()">☰</div>

        <div class="nav-links" id="navLinks">
            <a href="index.php">Home</a>
            <a href="countries.php">Countries</a>
            <a href="places.php">Places</a>
            <a href="blog.php">Blog</a>
            <a href="tips.php">Tips</a>
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
</script>