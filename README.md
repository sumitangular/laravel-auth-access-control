# Laravel Auth Access Control

This Laravel package provides authentication, role-permission management, REST API endpoints, and a Vue-powered admin panel.

## Installation

```bash
composer require sumitmishra/authaccesscontrol
```

## Publish Resources

```bash
php artisan vendor:publish --tag=views
php artisan vendor:publish --tag=migrations
```

## Demo Users

Run this to seed demo users and roles:

```bash
php artisan db:seed --class=Database\\Seeders\\DemoSeeder
```

Login:
- admin@example.com / password
- editor@example.com / password

## License

MIT
