# Project Organization Guide

## Current Project Status

This project is a good viva-ready PHP and MySQL travel guide website. The main feature files are understandable, the database relationship between countries and places is clear, and the documentation explains the important modules.

This guide explains how the files are organized and how to describe the project professionally.

## Main Folder Structure

```text
travel-guide-website/
|
|-- admin/
|   |-- admin-login.php
|   |-- admin-dashboard.php
|   |-- add-country.php
|   |-- manage-countries.php
|   |-- add-place.php
|   |-- manage-places.php
|   |-- blog-add.php
|   |-- blog-manage.php
|   |-- tips-add.php
|   |-- tips-manage.php
|
|-- assets/
|   |-- css/
|   |   |-- style.css
|   |   |-- account.css
|   |   |-- admin.css
|   |   |-- blog.css
|   |   |-- responsive.css
|   |
|   |-- js/
|   |   |-- search.js
|   |   |-- app-ui.js
|   |
|   |-- images/
|       |-- backgrounds/
|       |-- countries/
|       |-- places/
|       |-- places/thumbs/
|       |-- blogs/
|       |-- icons/
|   |
|   |-- videos/
|       |-- travel-hero.mp4
|
|-- documents/
|   |-- README.md
|   |-- PROJECT_ORGANIZATION.md
|   |-- QUICK_REFERENCE.md
|   |-- ENHANCEMENTS_IMPLEMENTED.md
|   |-- CLEANUP_REPORT.md
|   |-- VIDEO_ASSETS_README.md
|
|-- includes/
|   |-- db.php
|   |-- navbar.php
|   |-- footer.php
|   |-- auth.php
|
|-- sql/
|   |-- travel_guide.sql
|   |-- user-accounts.sql
|   |-- database-setup.sql
|   |-- railway-setup.sql
|   |-- travel_guide-root.sql
|
|-- testing-debugging/
|   |-- check-countries.php
|   |-- db-status.php
|   |-- debug-css.php
|   |-- debug-images.php
|   |-- debug-place-image.php
|
|-- index.php
|-- countries.php
|-- country-view.php
|-- places.php
|-- place-details.php
|-- blog.php
|-- blog-details.php
|-- tips.php
|-- login.php
|-- register.php
|-- profile.php
|-- logout.php
|-- save-place.php
```

## Folder Purpose

### `admin/`

Contains the admin dashboard and content management pages.

Examples:

- Add countries
- Manage countries
- Add places
- Manage places
- Add blogs
- Manage tips

### `assets/`

Contains frontend assets used by the website.

- `assets/css/`: CSS files for styling.
- `assets/js/`: JavaScript files.
- `assets/images/`: Project images grouped by type.
- `assets/videos/`: Video files used by the website.

This separation makes the frontend easier to maintain.

### `includes/`

Contains reusable PHP files.

- `db.php`: Database connection.
- `navbar.php`: Shared navigation bar.
- `footer.php`: Shared footer.
- `auth.php`: User login/session helper functions.

Using `includes/` avoids repeating the same code on every page.

### `sql/`

Contains SQL files used for database setup or migration.

- `travel_guide.sql`: Full database export.
- `user-accounts.sql`: User account tables and saved places table.
- `database-setup.sql`: Database setup script.
- `railway-setup.sql`: Railway deployment database setup.
- `travel_guide-root.sql`: Root-user database export/setup file.

### `documents/`

Contains project documentation and viva/reference notes.

- `README.md`: Main project overview.
- `PROJECT_ORGANIZATION.md`: Folder and module organization guide.
- `QUICK_REFERENCE.md`: Quick reference for icons, UI classes, and common tasks.
- `CLEANUP_REPORT.md`: Notes about cleanup work already completed.

### `testing-debugging/`

Contains helper PHP files used to check database, CSS, and image issues during development.

These files are separated from the public root so the main project folder stays cleaner.

### Root PHP Pages

The root folder contains public pages users visit directly.

Examples:

- `index.php`: Home page.
- `countries.php`: Country list page.
- `country-view.php`: Places for selected country.
- `places.php`: All places.
- `place-details.php`: Detailed place page.
- `blog.php`: Blog listing.
- `blog-details.php`: Detailed blog article page.
- `tips.php`: Travel tips.

## Country Module Organization

The country feature is organized like this:

```text
countries.php
    |
    |-- reads countries table
    |-- displays country cards
    |-- sends selected country id to country-view.php

country-view.php
    |
    |-- reads country id from URL
    |-- loads selected country
    |-- loads places where places.country_id = countries.id
```

Related database tables:

```text
countries
places
```

Relationship:

```text
countries.id -> places.country_id
```

## User Account Module Organization

The user account feature is organized like this:

```text
register.php
    |-- creates new user account

login.php
    |-- logs user into the website

profile.php
    |-- displays and updates user profile
    |-- displays saved places

save-place.php
    |-- saves or removes selected place for logged-in user

logout.php
    |-- ends user session
```

Related database tables:

```text
users
saved_places
```

Relationship:

```text
users.id -> saved_places.user_id
places.id -> saved_places.place_id
```

## Recommended Best-Practice Explanation

For viva, you can explain the organization like this:

```text
I organized the project into public pages, reusable include files, assets, admin files, documentation, testing/debugging helpers, and SQL files. Public pages such as countries.php and places.php handle the user-facing interface. Common files such as the database connection, navbar, footer, and authentication helper are placed inside the includes folder to avoid repeated code. CSS, JavaScript, images, and videos are kept inside the assets folder. Project documents are kept inside the documents folder, testing helpers are kept inside testing-debugging, and database setup files are separated into the SQL folder so the database can be imported easily.
```

## Code Organization Examples

### Reusing the Database Connection

Instead of writing database connection code in every page, the project uses:

```php
include('includes/db.php');
```

This improves maintainability because database changes only need to be made in one file.

### Reusing Navbar and Footer

Pages include the same navbar and footer:

```php
include('includes/navbar.php');
```

```php
include('includes/footer.php');
```

This keeps the website layout consistent.

### Keeping Images Organized

Country images are stored in:

```text
assets/images/countries/
```

Place images are stored in:

```text
assets/images/places/
```

This makes image management clearer and easier.

### Keeping CSS Organized

Shared and page-specific CSS files are stored in:

```text
assets/css/
```

Examples:

```text
assets/css/style.css
assets/css/admin.css
assets/css/account.css
assets/css/blog.css
assets/css/responsive.css
```

Keeping `blog.css` inside `assets/css/` keeps all stylesheet files in one predictable location.

## Files That Could Be Cleaned Later

These files are testing/debug helpers and are already separated inside the `testing-debugging/` folder:

```text
testing-debugging/check-countries.php
testing-debugging/db-status.php
testing-debugging/debug-css.php
testing-debugging/debug-images.php
testing-debugging/debug-place-image.php
```

They can be kept there for development support, or removed before a final submission if they are no longer needed.

## Professional Improvements Already Present

- Reusable include files.
- Separate assets folder.
- Separate admin module.
- SQL setup files.
- Separate documents folder.
- Separate testing/debugging folder.
- Country and place relational database design.
- Search feature for countries and places.
- User profile and saved places feature.
- Documentation for country module.

## Simple Final Viva Statement

```text
The project is organized into modules. The public pages are in the root folder, admin pages are in the admin folder, reusable PHP files are in includes, frontend resources are in assets, and database scripts are in SQL files. This structure makes the project easier to understand, maintain, and explain.
```
