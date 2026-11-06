# BookEase – Laravel Appointment Booking System

A portfolio/demo appointment booking application built with Laravel 12, PHP 8.2+, MySQL, Blade and Bootstrap 5.

## Features
- Public service listing and appointment request form
- Date/time selection and basic duplicate-slot validation
- Booking reference and pending confirmation screen
- Admin login and dashboard statistics
- Appointment status management: pending, confirmed, cancelled, completed
- Add services and activate/deactivate them

## Setup on XAMPP (Windows)
1. Install PHP 8.2+, Composer and XAMPP.
2. Extract this folder to `C:\xampp\htdocs\appointment-booking`.
3. Start MySQL in XAMPP and create database `appointment_booking` in phpMyAdmin.
4. Open terminal in the project folder and run:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

5. Open `http://127.0.0.1:8000`.

## Demo admin account
- URL: `http://127.0.0.1:8000/admin/login`
- Email: `admin@bookease.test`
- Password: `ChangeMe123!`

Change the demo password before any deployment beyond your local machine.

## GitHub safety
Commit `.env.example`, not `.env`. Do not upload credentials, real customer data, `vendor/`, logs, or cache files. Add your own screenshots to a `screenshots/` folder.

## Important limitations
This is a starter portfolio project, not production-ready booking software. It uses a fixed list of time slots and a basic duplicate date/time check. It does not yet support staff calendars, variable service-duration availability, time zones, holidays, email/SMS notifications, online payments, rescheduling, or transactional slot locking. Add those controls and automated tests before real-world use.
