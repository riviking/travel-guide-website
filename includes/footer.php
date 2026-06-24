<?php $footerBase = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'admin') ? '../' : ''; ?>

<footer class="professional-footer">
    <div class="footer-container">
        <!-- About Section -->
        <div class="footer-section">
            <h3><i class="fas fa-globe"></i> Travel Guide</h3>
            <p>Discover the world's most beautiful destinations, hidden gems, and travel tips. Your ultimate travel companion.</p>
            <div class="social-links">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
            <h4><i class="fas fa-link"></i> Quick Links</h4>
            <ul>
                <li><a href="index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                <li><a href="countries.php"><i class="fas fa-chevron-right"></i> Countries</a></li>
                <li><a href="places.php"><i class="fas fa-chevron-right"></i> Places</a></li>
                <li><a href="blog.php"><i class="fas fa-chevron-right"></i> Blog</a></li>
                <li><a href="tips.php"><i class="fas fa-chevron-right"></i> Tips</a></li>
            </ul>
        </div>

        <!-- Resources -->
        <div class="footer-section">
            <h4><i class="fas fa-book"></i> Resources</h4>
            <ul>
                <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Privacy Policy</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Terms of Service</a></li>
                <li><a href="admin/admin-login.php"><i class="fas fa-chevron-right"></i> Admin Panel</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div class="footer-section">
            <h4><i class="fas fa-envelope"></i> Newsletter</h4>
            <p>Subscribe to get the latest travel tips & destinations!</p>
            <form class="newsletter-form" onsubmit="return false;">
                <input type="email" placeholder="Enter your email" required>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Travel Guide. All Rights Reserved.</p>
        <p>Built with <i class="fas fa-heart" style="color: #ff1744;"></i> by Tourism management hub | Powered by PHP & MySQL</p>
    </div>
</footer>

<style>
/* Professional Footer Styles */
.professional-footer {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    color: #e0e0e0;
    padding: 50px 20px 30px;
    margin-top: 60px;
    font-family: 'Inter', sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-bottom: 40px;
}

.footer-section h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #1e90ff;
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer-section h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 15px;
    color: #1e90ff;
    display: flex;
    align-items: center;
    gap: 8px;
}

.footer-section p {
    line-height: 1.6;
    color: #b0b0b0;
    margin-bottom: 15px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #b0b0b0;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.footer-section ul li a:hover {
    color: #1e90ff;
    transform: translateX(5px);
}

.footer-section ul li a i {
    font-size: 0.8rem;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-links a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(30, 144, 255, 0.2);
    border-radius: 50%;
    color: #1e90ff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #1e90ff;
    color: white;
    transform: translateY(-5px);
}

/* Newsletter Form */
.newsletter-form {
    display: flex;
    margin-top: 15px;
}

.newsletter-form input {
    flex: 1;
    padding: 12px 15px;
    border: 1px solid rgba(30, 144, 255, 0.3);
    background: rgba(255, 255, 255, 0.05);
    color: white;
    border-radius: 6px 0 0 6px;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease;
}

.newsletter-form input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.1);
    border-color: #1e90ff;
}

.newsletter-form input::placeholder {
    color: #808080;
}

.newsletter-form button {
    padding: 12px 20px;
    background: linear-gradient(135deg, #1e90ff 0%, #0077e6 100%);
    color: white;
    border: none;
    border-radius: 0 6px 6px 0;
    cursor: pointer;
    transition: all 0.3s ease;
}

.newsletter-form button:hover {
    transform: translateX(3px);
    box-shadow: 0 6px 12px rgba(30, 144, 255, 0.4);
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(30, 144, 255, 0.2);
    padding-top: 20px;
    text-align: center;
    color: #808080;
}

.footer-bottom p {
    margin: 5px 0;
    font-size: 0.9rem;
}

/* Dark Mode Footer */
body.dark-mode .professional-footer {
    background: linear-gradient(135deg, #0a0e27 0%, #0f1729 100%);
}

body.dark-mode .footer-section h3,
body.dark-mode .footer-section h4 {
    color: #4da6ff;
}

body.dark-mode .social-links a {
    background: rgba(77, 166, 255, 0.15);
}

body.dark-mode .newsletter-form input {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(77, 166, 255, 0.25);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .footer-container {
        gap: 30px;
    }

    .footer-section {
        text-align: center;
    }

    .social-links {
        justify-content: center;
    }

    .newsletter-form {
        flex-direction: column;
    }

    .newsletter-form input {
        border-radius: 6px 6px 0 0;
    }

    .newsletter-form button {
        border-radius: 0 0 6px 6px;
    }
}
</style>

<script src="<?php echo $footerBase; ?>assets/js/search.js?v=3"></script>
<script src="<?php echo $footerBase; ?>assets/js/app-ui.js?v=3"></script>

</body>
</html>
