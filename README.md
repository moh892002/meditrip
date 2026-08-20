# MediTrip

A medical tourism web application built with Laravel that connects patients with hospitals, specialists, and medical services across different cities.

## Features

### Public Site

- Browse hospitals with detailed profiles, ratings, and city filtering
- Explore medical specializations and associated hospitals
- Read health-related blog articles
- Contact form for inquiries
- Multi-step quote/request questionnaire for medical services
- User authentication (login, registration, password reset)
- User profile management with order history

### Admin Dashboard

- Full CRUD management for hospitals, specializations, specialists, offers, articles, and contact messages
- Order management with status updates
- User management (view and delete)
- Ratings overview and management
- Dashboard with statistics: counts, recent entries, top-rated hospitals, hospitals by city

## Tech Stack

- **Backend:** Laravel 13, PHP 8.3+
- **Frontend:** Vite, Blade templates
- **Database:** SQLite (default), configurable to MySQL/PostgreSQL
- **Testing:** Pest

## Requirements

- PHP 8.3+
- Composer
- Node.js & npm

## Installation

```bash
composer setup
```

This single command will:
1. Install PHP dependencies
2. Create `.env` file from `.env.example`
3. Generate application key
4. Run database migrations
5. Install Node.js dependencies
6. Build frontend assets

## Running the Application

```bash
composer dev
```

This starts the development server, queue worker, log viewer, and Vite dev server concurrently.

## Testing

```bash
composer test
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
