# Basic Authentication with Sentry

My personal starting point for any laravel app that requires standard users and admin users. Also has editable profiles (standard users can edit their own profile, admin users can edit all profiles).

[See demo here](http://authdemo.andremadarang.com/) or install locally with instructions below.

## Installation

This is just local installation using something like MAMP/WAMP or xampp

1. clone the repo and cd into it
2. `composer install`
3. make sure db is running and credentials are setup in `app\config\database.php`
3. `php artisan migrate`
4. `php artisan db:seed`
5. `php artisan serve`
6. Visit [localhost:8000](http://localhost:8000) in your browser
