# Basic Authentication with Sentry

Updated to Laravel 5.1. My personal starting point for any Laravel app that requires standard users and admin users. Also has editable profiles (standard users can edit their own profile, admin users can edit all profiles).

[See demo here](http://authdemo.andremadarang.com/) (demo is Laravel 4 version but it works exactly the same) or install locally with instructions below.

## Installation

This is just local installation using something like MAMP/WAMP or xampp. Of course you are free to use homestead if you like.

1. clone the repo and cd into it
2. `composer install`
3. make sure db is running and credentials are setup in `config\database.php` (or in your `.env` file).
4. If you have no `.env` file you can use the example one. Just rename `.env.example` to `.env`. Enter your db credentials here.
5. `php artisan key:generate`
6. `php artisan migrate`
7. `php artisan db:seed`
8. `php artisan serve`
9. Visit [localhost:8000](http://localhost:8000) in your browser
