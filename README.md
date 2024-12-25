# Project Setup Guide

## Prerequisites

-   PHP
-   Composer
-   Node.js & NPM
-   MySQL/PostgreSQL

## Installation Steps

1. Clone the repository

```bash
git clone https://github.com/puruhitaaa/easyeats.git
```

2. Install PHP dependencies

```bash
composer install
```

3. Install Node.js dependencies

```bash
npm install
```

4. Environment Configuration

    - Copy `.env.example` to `.env`
    - Configure your database and other environment variables

5. Database Setup

```bash
php artisan migrate
```

6. Seed initial roles and permissions

```bash
php artisan db:seed --class=RoleAndPermissionSeeder
```

7. Create Filament admin user

```bash
php artisan make:filament-user
```

8. Configure admin role assignment

    - Navigate to `database/seeders/AssignAdminRoleSeeder.php`
    - Replace `"your-email-here@example.com"` with your created Filament user's email

9. Assign admin role to created filament admin user (filament admin panel can only be accessed to assigned as admin users)

```bash
php artisan db:seed --class=AssignAdminRoleSeeder
```

10. Seed the database with sample data

```bash
php artisan db:seed
```

11. Run the development server

```bash
composer run dev
```

## (Optional)

12. Modify the images needed for each resource in the database by:
    -   Navigate the browser url to `http://localhost:8000/admin` and log in using the created filament admin user
    -   Each resource will be displayed on the sidebar, click on each resource to access the respective table and add/edit the image field

## Usage

For available routes and endpoints, please refer to `routes/web.php`.
