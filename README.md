## Laravel Boilerplate (Current: Laravel 8.*) ([Demo](https://demo.laravel-boilerplate.com))

[![Latest Stable Version](https://poser.pugx.org/rappasoft/laravel-boilerplate/v/stable)](https://packagist.org/packages/rappasoft/laravel-boilerplate)
[![Latest Unstable Version](https://poser.pugx.org/rappasoft/laravel-boilerplate/v/unstable)](https://packagist.org/packages/rappasoft/laravel-boilerplate) 
<br/>
[![StyleCI](https://styleci.io/repos/30171828/shield?style=plastic)](https://github.styleci.io/repos/30171828)
![Tests](https://github.com/rappasoft/laravel-boilerplate/workflows/Tests/badge.svg?branch=master)
<br/>
![GitHub contributors](https://img.shields.io/github/contributors/rappasoft/laravel-boilerplate.svg)
![GitHub stars](https://img.shields.io/github/stars/rappasoft/laravel-boilerplate.svg?style=social)

### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret

### Official Documentation

[Click here for the official documentation](http://laravel-boilerplate.com)

### Slack Channel

Please join us in our Slack channel to get faster responses to your questions. Get your invite here: https://laravel-5-boilerplate.herokuapp.com

### Introduction

Laravel Boilerplate provides you with a massive head start on any size web application. Out of the box it has features like a backend built on CoreUI with Spatie/Permission authorization. It has a frontend scaffold built on Bootstrap 4. Other features such as Two Factor Authentication, User/Role management, searchable/sortable tables built on my [Laravel Livewire tables plugin](https://github.com/rappasoft/laravel-livewire-tables), user impersonation, timezone support, multi-lingual support with 20+ built in languages, demo mode, and much more.

### Issues

If you come across any issues please [report them here](https://github.com/rappasoft/laravel-boilerplate/issues).

### Contributing

Thank you for considering contributing to the Laravel Boilerplate project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to Anthony Rappa at rappa819@gmail.com.

### Security Vulnerabilities

If you discover a security vulnerability within this boilerplate, please send an e-mail to Anthony Rappa at rappa819@gmail.com, or create a pull request if possible. All security vulnerabilities will be promptly addressed.

### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)

### INSTALL

1. create new database <br/>
2. rename file .env.example to .env (Note: Make sure you have hidden files shown on your system) <br/>
3. on your .env file update the following lines <br/>
   - DB_CONNECTION=mysql <br/>
   - DB_HOST=127.0.0.1 <br/>
   - DB_PORT=3306 <br/>
   - DB_DATABASE={your_dbname} <br/>
   - DB_USERNAME={your_username} <br/>
   - DB_PASSWORD={your_password} <br/>
4. delete file package-lock.json <br/>
5. "COMPOSER_MEMORY_LIMIT=-1 composer install" from the root of the project <br/>
6. "npm install" from the root of the project <br/>
7. "yarn" from the root of the project (If you have Yarn installed)<br/>
8. "php artisan key:generate" from the root of the project (You should see a green message stating your key was successfully generated. As well as you should see the APP_KEY variable in your .env file reflected)<br/>
9. "php artisan migrate" from the root of the project <br/>
10. "php artisan db:seed" from the root of the project <br/>
11. "php artisan module:seed Pegawai --class=PegawaiSeederTableSeeder" from the root of the project (optional, test module Pegawai)<br/>
12. "php artisan storage:link" from the root of the project <br/>
13. "php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"" from the root of the project (Optionally, publish the package's configuration file)<br/>
14. "php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config" from the root of the project (Optionally, publish the package's configuration file) <br/>
15. "npm run dev" from the root of the project <br/>
16. "phpunit" from the root of the project <br/>

### SOURCE

1. https://github.com/nWidart/laravel-modules <br/>
2. https://docs.laravel-excel.com/3.1/getting-started/installation.html <br/>
