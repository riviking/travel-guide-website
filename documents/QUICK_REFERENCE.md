# 🎯 Quick Reference Guide - Icon & Component Usage

## 🏗️ Files You Need to Know

```
includes/
├── navbar.php          ← Font Awesome CDN, Dark Mode Toggle, Google Fonts
├── footer.php          ← Professional Footer with Social Links
└── db.php

assets/css/
├── style.css           ← Updated Typography
├── admin.css
├── account.css
├── blog.css            ← Blog page styling
└── responsive.css

pages/
├── index.php           ← Home with nav-cards & featured section
├── countries.php       ← Breadcrumb added
├── places.php          ← Breadcrumb added
├── blog.php
└── tips.php
```

---

## 🎨 Icon Quick Reference

### Common Icons by Category:

#### Navigation
```html
<i class="fas fa-home"></i>           <!-- Home -->
<i class="fas fa-globe"></i>          <!-- Global/Logo -->
<i class="fas fa-chevron-right"></i>  <!-- Arrow -->
<i class="fas fa-chevron-left"></i>   <!-- Back -->
<i class="fas fa-search"></i>         <!-- Search -->
<i class="fas fa-menu"></i>           <!-- Menu -->
```

#### Travel-Related
```html
<i class="fas fa-flag"></i>                <!-- Countries -->
<i class="fas fa-map-location-dot"></i>    <!-- Places -->
<i class="fas fa-map"></i>                 <!-- Map -->
<i class="fas fa-compass"></i>             <!-- Compass -->
<i class="fas fa-plane"></i>               <!-- Airplane -->
<i class="fas fa-hotel"></i>               <!-- Hotel -->
<i class="fas fa-utensils"></i>            <!-- Restaurant -->
<i class="fas fa-camera"></i>              <!-- Photography -->
<i class="fas fa-binoculars"></i>          <!-- Tours -->
```

#### Content
```html
<i class="fas fa-pen-fancy"></i>   <!-- Blog/Writing -->
<i class="fas fa-lightbulb"></i>   <!-- Tips -->
<i class="fas fa-star"></i>        <!-- Rating/Favorite -->
<i class="fas fa-heart"></i>       <!-- Like -->
<i class="fas fa-bookmark"></i>    <!-- Bookmark -->
<i class="fas fa-share"></i>       <!-- Share -->
<i class="fas fa-comment"></i>     <!-- Comment -->
```

#### Actions
```html
<i class="fas fa-lock"></i>        <!-- Admin/Lock -->
<i class="fas fa-unlock"></i>      <!-- Unlock -->
<i class="fas fa-edit"></i>        <!-- Edit -->
<i class="fas fa-trash"></i>       <!-- Delete -->
<i class="fas fa-download"></i>    <!-- Download -->
<i class="fas fa-upload"></i>      <!-- Upload -->
<i class="fas fa-print"></i>       <!-- Print -->
```

#### Info & Status
```html
<i class="fas fa-info-circle"></i>    <!-- Info -->
<i class="fas fa-check-circle"></i>   <!-- Success -->
<i class="fas fa-exclamation-circle"></i> <!-- Warning -->
<i class="fas fa-times-circle"></i>   <!-- Error -->
<i class="fas fa-clock"></i>          <!-- Time -->
<i class="fas fa-calendar"></i>       <!-- Date -->
<i class="fas fa-envelope"></i>       <!-- Email -->
<i class="fas fa-phone"></i>          <!-- Phone -->
```

#### Interface
```html
<i class="fas fa-moon"></i>        <!-- Dark Mode -->
<i class="fas fa-sun"></i>         <!-- Light Mode -->
<i class="fas fa-language"></i>    <!-- Languages -->
<i class="fas fa-cog"></i>         <!-- Settings -->
<i class="fas fa-bell"></i>        <!-- Notifications -->
<i class="fas fa-user"></i>        <!-- Profile -->
<i class="fas fa-sign-out"></i>    <!-- Logout -->
```

#### Social Media
```html
<i class="fab fa-facebook-f"></i>      <!-- Facebook -->
<i class="fab fa-instagram"></i>       <!-- Instagram -->
<i class="fab fa-twitter"></i>         <!-- Twitter -->
<i class="fab fa-linkedin-in"></i>     <!-- LinkedIn -->
<i class="fab fa-youtube"></i>         <!-- YouTube -->
<i class="fab fa-tiktok"></i>          <!-- TikTok -->
<i class="fab fa-whatsapp"></i>        <!-- WhatsApp -->
```

---

## 📝 Usage Examples

### 1. Add Icon to Heading
```html
<h2><i class="fas fa-map-location-dot"></i> Popular Destinations</h2>
```

### 2. Icon with Link
```html
<a href="blog.php">
    <i class="fas fa-pen-fancy"></i> Read Our Blog
</a>
```

### 3. Icon Button
```html
<button>
    <i class="fas fa-heart"></i> Save Place
</button>
```

### 4. Icon List
```html
<ul>
    <li><i class="fas fa-check"></i> Free Cancellation</li>
    <li><i class="fas fa-check"></i> Best Price Guarantee</li>
    <li><i class="fas fa-check"></i> 24/7 Support</li>
</ul>
```

### 5. Icon with Text
```html
<p>
    <i class="fas fa-location-pin"></i> 
    <strong>Location:</strong> Paris, France
</p>
```

---

## 🔄 Dark Mode Implementation

### Automatic Dark Mode Support:
The dark mode toggle in the navbar automatically switches colors for:
- `.card` elements
- `.page-background`
- `.page-title`
- `.navbar`
- `.bluish-section`
- `.professional-footer`

### Adding Dark Mode to Custom Elements:
```css
body.dark-mode .your-element {
    background: rgba(30, 30, 40, 0.9);
    color: #e0e0e0;
    border-color: rgba(100, 100, 150, 0.3);
}
```

---

## 📱 Breadcrumb Implementation

### Add to Any Page:
```html
<div class="breadcrumb" style="margin: 0 auto;">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <span class="separator">/</span>
    <span class="current"><i class="fas fa-your-icon"></i> Current Page</span>
</div>
```

### Example for Blog Page:
```html
<div class="breadcrumb" style="margin: 0 auto;">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <span class="separator">/</span>
    <span class="current"><i class="fas fa-pen-fancy"></i> Blog</span>
</div>
```

---

## ⚡ Loading States

### Show Spinner While Loading:
```html
<div id="loader">
    <div class="spinner"></div>
</div>
```

```javascript
// Hide when loaded
document.getElementById('loader').style.display = 'none';
```

### Skeleton Loading:
```html
<div class="skeleton skeleton-card"></div>
<div class="skeleton skeleton-title"></div>
<div class="skeleton skeleton-text"></div>
```

### Pulse Animation:
```html
<div class="pulse">
    <i class="fas fa-star"></i> Loading...
</div>
```

---

## 🎨 Component Classes

### Cards
```css
.card                 /* Main card container */
.card:hover          /* Hover state with animation */
.card-body           /* Card content area */
.card-body h3        /* Card title */
.card-body p         /* Card description */
.rating              /* Star rating display */
.btn                 /* Action button */
```

### Navigation
```css
.navbar              /* Navigation bar */
.nav-links           /* Navigation links */
.nav-card            /* Home page nav cards (purple) */
.page-countries .card  /* Country cards (purple) */
.page-places .card     /* Place cards (blue) */
```

### Footer
```css
.professional-footer         /* Footer container */
.footer-container            /* Footer content grid */
.footer-section              /* Each footer section */
.social-links                /* Social media icons */
.newsletter-form             /* Email subscription */
.footer-bottom               /* Copyright section */
```

### Breadcrumb
```css
.breadcrumb          /* Breadcrumb container */
.breadcrumb a        /* Breadcrumb links */
.breadcrumb .separator /* "/" separator */
.breadcrumb .current /* Current page */
```

---

## 🎯 Common Tasks

### Task 1: Add Icon to Card Title
**File:** `countries.php` or `places.php`
```html
<!-- Find: -->
<h3><?php echo htmlspecialchars($row['name']); ?></h3>

<!-- Replace with: -->
<h3><i class="fas fa-map-location-dot"></i> <?php echo htmlspecialchars($row['name']); ?></h3>
```

### Task 2: Add Rating Stars
```html
<div class="rating">
    <i class="fas fa-star"></i> 4.5/5.0
</div>
```

### Task 3: Add Social Icons to Card
```html
<div style="display: flex; gap: 10px; margin-top: 10px;">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
</div>
```

### Task 4: Add Info Icon with Text
```html
<p><i class="fas fa-info-circle"></i> This is important information</p>
```

### Task 5: Create Icon Button
```html
<button style="background: #1e90ff; color: white; border: none; padding: 10px 15px; border-radius: 6px; cursor: pointer;">
    <i class="fas fa-download"></i> Download
</button>
```

---

## 🚀 Pro Tips

1. **Icon Colors:** Add CSS to style icon color
   ```css
   .your-element i {
       color: #1e90ff;
       margin-right: 8px;
   }
   ```

2. **Icon Sizing:** Use inline style or CSS
   ```html
   <i class="fas fa-star" style="font-size: 20px;"></i>
   ```

3. **Icon Animation:**
   ```css
   .your-element i {
       transition: all 0.3s ease;
   }
   
   .your-element:hover i {
       transform: scale(1.2) rotate(10deg);
   }
   ```

4. **Mobile Icons:** Icons automatically size responsively
   ```html
   <!-- No special code needed, works on all devices -->
   <i class="fas fa-home"></i>
   ```

---

## 📚 Resources

- **Font Awesome Icons:** https://fontawesome.com/icons
- **Google Fonts:** https://fonts.google.com
- **CDN Links (already added to navbar.php)**
  - Font Awesome: https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
  - Google Fonts: https://fonts.googleapis.com/css2?family=Poppins...

---

**Last Updated:** 2026-06-23
**Reference Version:** 1.0
