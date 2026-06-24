# Cleanup Report

## What Changed

- Moved project documents into `documents/`.
- Moved all root SQL files into `sql/`.
- Moved testing and debugging PHP files into `testing-debugging/`.
- Moved `assets/videos/README.md` to `documents/VIDEO_ASSETS_README.md`.
- Removed empty/repeated files:
  - `search.php`
  - `test.php`
  - `includes/test_db.php`
- Removed unused/repeated asset folders:
  - `assets/images/places/mont-saint-michel_files/`
  - `assets/images/backgrounds/New folder/`
  - `assets/images/places/full/`

## Notes

- The original root `travel_guide.sql` was moved to `sql/travel_guide-root.sql` because `sql/travel_guide.sql` already existed.
- `testing-debugging/db-status.php` replaces the repeated database test files.
- `assets/images/places/full/` was removed because the same files already existed in `assets/images/places/`, which is what the current PHP pages use.
- Public website pages remain in the project root.
