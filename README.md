# 🌍 Travel Guide

A full-stack travel discovery web application built with **PHP** and **MySQL**. Browse countries, explore detailed places, read travel blogs, and pick up practical travel tips — all through a responsive, light/dark themed interface with a dedicated admin panel behind it.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/status-in%20development-yellow)

---

## 📖 About

Travel Guide centralizes country and place information — history, best time to visit, entry fees, map links — alongside a travel blog and tips section, so users don't need five different sites to plan a trip. Built as a group project by a 5-person team, each owning a distinct module.

## ✨ Features

**Visitor**
- Browse countries with search, and drill into detailed country pages
- Explore places by category and rating, with full detail pages (history, entry fee, best time to visit, Google Maps link)
- View top-rated places sorted by rating
- Save favourite places to a personal list
- Read travel blog posts and full articles
- Browse practical travel tips by category
- Register, log in/out, and manage a personal profile
- Light / dark theme toggle site-wide

**Admin**
- Secure admin login
- Dashboard overview of site content
- Add & manage countries, places, blog posts, and tips
- Dedicated admin sidebar navigation

## 🖼️ Screenshots

<!-- Add screenshots below. Suggested: Home, Countries, Places, Place Details, Blog, Tips, Admin Dashboard (light & dark) -->

| Countries — Light | Countries — Dark |
|---|---|
| _add screenshot_ | _add screenshot_ |

| Admin — Add Blog (Light) | Admin — Add Blog (Dark) |
|---|---|
| _add screenshot_ | _add screenshot_ |

## 🗄️ Database Schema (ER Diagram)

<!-- Add ER diagram image here, e.g. docs/er-diagram.png -->

**Tables:** `countries`, `places`, `place_details`, `blog`, `tips`, `users`, `saved_places`, `admins`

See [`database-setup.sql`](./database-setup.sql) for the full schema and sample data.

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP (mysqli, prepared statements) |
| Database | MySQL |
| Frontend | HTML5, CSS3, JavaScript |
| Styling | Custom CSS (`style.css`, `admin.css`, `blog.css`, `account.css`, `responsive.css`), Bootstrap 5 (blog pages) |
| Tooling | MySQL Workbench, phpMyAdmin |

## 🚀 Getting Started

### Prerequisites
- PHP 7.4+ with the `mysqli` extension
- MySQL 5.7+ (or MariaDB equivalent)
- A local server stack (XAMPP, WAMP, MAMP) or the PHP built-in server

### Setup

1. **Clone the repo**
   ```bash
   git clone https://github.com/<your-username>/travel-guide.git
   cd travel-guide
   ```

2. **Import the database**
   - Open MySQL Workbench or phpMyAdmin
   - Run [`database-setup.sql`](./database-setup.sql) to create the `travel_guide` database and seed sample data

3. **Configure your database connection**
   - Copy the example config:
     ```bash
     cp includes/config.example.php includes/db.php
     ```
   - Edit `includes/db.php` with your local MySQL credentials:
     ```php
     $host = "localhost";
     $port = 3306;
     $user = "root";
     $password = "your_password";
     $database = "travel_guide";
     ```
   - ⚠️ `db.php` is git-ignored — never commit real credentials.

4. **Run the app**
   ```bash
   php -S localhost:8000
   ```
   Visit `http://localhost:8000` in your browser.

5. **Verify the connection**
   Visit `http://localhost:8000/test.php` — it should print `Database Connected Successfully!`

## 📁 Project Structure

```
travel-guide/
├── includes/
│   ├── db.php              # DB connection (git-ignored, create from config.example.php)
│   ├── navbar.php
│   ├── footer.php
│   └── functions.php
├── admin/
│   ├── admin-login.php
│   ├── admin-dashboard.php
│   ├── manage-countries.php
│   ├── manage-places.php
│   └── ...
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── index.php
├── countries.php
├── country-view.php
├── places.php
├── place-details.php
├── top-places.php
├── blog.php
├── blog-details.php
├── tips.php
├── search.php
└── database-setup.sql
```

## 👥 Team & Contributions

| Member | Contribution |
|---|---|
| **Rivindu Osada** | Project idea & database design, `index.php`, save places, login/logout & auth, countries & country view, profile & register, `config.php`/`db.php`, footer, navbar, `app-ui.js`, `account.css`, `style.css` |
| **Tharushika** | Top Places page, Places listing page |
| **Vimuth** | Full admin panel & sidebar, admin login, add/manage country, place, blog, tips, admin dashboard |
| **Heshan** | Blog page, Tips page, `blog.css` |
| **Vishva** | Place Details page, `search.js` |

## 🗺️ Roadmap

- [ ] Move admin passwords from plaintext to hashed storage
- [ ] Add CSRF protection and input sanitization audit
- [ ] Deploy to public hosting with live demo link
- [ ] Add `file_exists` checks before all image renders
- [ ] Expand test coverage for admin CRUD flows

## 📄 License

This project was built for academic purposes. Feel free to fork and adapt for learning.

---

Built with ❤️ by Rivindu Osada, Tharushika, Vimuth, Heshan & Vishva.
