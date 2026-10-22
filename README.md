# Visit Baubau

A tourism information web application for Baubau City, built as my **final project (Tugas Akhir) for the Diploma 3 (D3) Information Systems program** (2022).
It is developed with CodeIgniter 4 and MySQL/MariaDB.

## Features
- Tourist destination information with categories
- Articles with visitor comments
- Events with categories
- Local product marketplace with catalog and search
- Visitor question box
- Vision, mission, and organizational structure pages
- Authentication with [Myth:Auth](https://github.com/lonnieezell/myth-auth) and two roles:
  `admin` (manages all content and users) and `penjual` (seller, manages their own products)

## Tech Stack
PHP 7.4+ / 8.x, CodeIgniter 4, Myth:Auth, MySQL/MariaDB, Bootstrap.

## Running Locally
1. Run `composer install`.
2. Copy `env` to `.env`, then fill in `database.default.*` and, optionally, `email.*` for SMTP.
3. Create a database and import `DATABASE/schema.sql` (table structure only, no data).
4. Register an account, then set its role to `admin` through the `auth_groups_users` table.
5. Run `php spark serve` and open `http://localhost:8080`.

## Notes
- SMTP credentials, data dumps, and user photos are not stored in this repository.
- The repository has no automated tests beyond the CodeIgniter skeleton.
- See [CHANGELOG.md](CHANGELOG.md) for the update history.

License: MIT.
