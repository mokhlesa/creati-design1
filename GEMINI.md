# GEMINI.md - Project Overview

## Project Overview

This project is a web application built with the Laravel framework (version 12). Based on the file structure, routes, and database schema, it appears to be an **e-learning platform**.

The application features:
*   Publicly accessible course listings and a blog.
*   User registration and authentication.
*   A role-based access control system (`users` table has a `role_id`).
*   An admin dashboard for managing users, roles, categories, posts, courses, lessons, orders, and more.
*   Functionality for students to enroll in courses.
*   Features related to AI-powered design consultations and student work showcases.

### Technologies

*   **Backend:** PHP / Laravel 12
*   **Frontend:** Tailwind CSS, Alpine.js, Vite
*   **Database:** (Not specified, but likely MySQL, PostgreSQL, or SQLite, as is common with Laravel)
*   **Testing:** PestPHP

## Building and Running

### Setup

To set up the project for the first time, run the following command from the project root:

```bash
composer setup
```

This command will:
1.  Install Composer dependencies.
2.  Create a `.env` file from `.env.example`.
3.  Generate an application key.
4.  Run database migrations.
5.  Install NPM dependencies.
6.  Build frontend assets.

### Development

To run the application in a local development environment, use the following command:

```bash
composer dev
```

This will concurrently start:
*   The PHP development server (`php artisan serve`).
*   A queue worker (`php artisan queue:listen`).
*   The Vite server for frontend asset compilation (`npm run dev`).

The application will typically be available at `http://127.0.0.1:8000`.

### Building for Production

To compile and minify frontend assets for a production environment, run:

```bash
npm run build
```

### Running Tests

To execute the application's test suite, use:

```bash
composer test
```
This will run the PestPHP tests.

## Development Conventions

*   **Routing:** Web routes are defined in `routes/web.php` and API routes (if any) would be in `routes/api.php`. The application uses resource controllers for CRUD operations, particularly in the admin section.
*   **Database:** Database schema changes are managed through migration files located in `database/migrations`.
*   **Views:** Frontend views are written using Blade templates and can be found in `resources/views`. The application uses a layout-based approach for structuring views (e.g., `app.blade.php`, `guest.blade.php`).
*   **Frontend Assets:** CSS and JavaScript are managed via Vite and are located in `resources/css` and `resources/js`, respectively.
*   **Styling:** The project uses Tailwind CSS for styling. Configuration can be found in `tailwind.config.js`.
