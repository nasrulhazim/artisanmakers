## About Artisan Makers

This package extend the capbilities of Laravel Artisan Make Command.

## Installation

```
composer require nasrulhazim/artisanmakers
```

Open up `app/Providers/AppServiceProvider.php` and register the service provider as following:

```php
if ($this->app->environment() !== 'production') {
    $this->app->register(\NasrulHazim\ArtisanMakers\ArtisanMakersServiceProvider::class);
}
```

## Usage

Type `php artisan --help` for more details.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).