## About CMS LBH

Case Management System for LBH.

## Base features:

- Users Management
- Person Management
- Case Management
- Case Handling
- Case Progress

## Environment

- PHP 7.2
- MySQL 5.6
- Composer 1.7.2
- Laravel 5.5

## Installation

To install into your local computer:
1. Clone this repository or download zip files and extract to your local computer (e.g.: /var/www or /xampp/htdocs).
2. Install composer (https://getcomposer.org/download/) if not existing yet.
3. Open terminal & locate to /cmslbh folder.
4. Execute: composer install 
5. Execute: php artisan key:generate
6. Configure your local database: rename file .env.example to .env and change database account appropriately.
7. Manually import .sql file in /cmslbh/database folder into your local database.
8. Open in a browser: http://localhost/cmslbh/public
9. Login with: admin@localhost.net | adminlbh

## Bug & Security Vulnerabilities

If you discover a bug or security vulnerability within this software, please send an e-mail to [rezazenaulia@gmail.com](mailto:rezazenaulia@gmail.com). All bugs & security vulnerabilities will be promptly addressed.

## Credits

- botak
- spartacusnav
- rezazenaulia
- redbtn

## License

This software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
