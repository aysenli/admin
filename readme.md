## compose-laravel

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/admin/admin)


## Installation
---
In order to install Laravel 5 Entrust, just add

```php
"zhuayi/admin": "~1.1.1"
```
to your composer.json. Then run composer install or composer update.

Then in your config/app.php add

```php
Zhuayi\admin\BaseAdminServiceProvider::class
```

If you are going to use Middleware (requires Laravel 5.1 or later) you also need to add
```php
'admin' => \Zhuayi\admin\Middleware\AdminMiddleware::class
```
to routeMiddleware array in app/Http/Kernel.php.

modify DB info to  **.env**

Run Publish
```shell
php artisan vendor:publish --force
```

Run autoload
```shell
composer dump-autoload --optimize
```
Run db:seed
```shell
php artisan db:seed --class="AdminDataSeeder"
```