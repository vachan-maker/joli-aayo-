# Joli Aayo?

Joli Aayo? is a Laravel app for tracking job applications and managing resume versions tied to each application.

## Features

- User registration, login, logout, and password reset flow
- Create, view, edit, and delete job applications
- Track application status (`applied`, `interview`, `gd`, `test/aptitude`, `offer`, `accepted`, `rejected`, `no response`)
- Upload and manage resume versions (PDF)
- Link an application to a specific resume version
- Download or view uploaded resumes

## Tech Stack

- PHP / Laravel 13
- Pest for testing
- Vite + Tailwind CSS for frontend assets
- SQLite/MySQL compatible migrations via Laravel

## Requirements

- PHP 8.4+ (project `.php-version` is `8.4`)
- Composer
- Node.js + npm

## Quick Start

```bash
git clone <your-fork-or-repo-url>
cd joli-aayo-
composer run setup
```

The setup script installs PHP/Node dependencies, creates `.env`, generates an app key, runs migrations, and builds frontend assets.

## Running Locally

Start all dev services (app server, queue worker, logs, Vite):

```bash
composer run dev
```

## Database

Run migrations manually if needed:

```bash
php artisan migrate
```

## Testing

Run the test suite:

```bash
php artisan test --compact
```

or

```bash
composer test
```

## Main Routes

- `/register` – create account
- `/login` – authenticate
- `/applications` – manage job applications
- `/resume` – manage resume versions
- `/profile` – user profile page

## Notes

- Resume uploads are validated as PDF files up to 4MB.
- If frontend changes are not visible, run `npm run dev` or `npm run build`.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
