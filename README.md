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

On initial setup, run `php artisan am:install`.

## Usage

Type `php artisan --help` for more details.

## Available Aritsan Makers Command

- [x] Contracts: `php artisan am:contract ClassName`
- [ ] Exceptions: `php artisan am:exception ClassName`
- [ ] Macros: `php artisan am:macro ClassName`
- [ ] Presenters: `php artisan am:presenter ClassName`
- [ ] Processors: `php artisan am:processor ClassName`
- [ ] Repositories: `php artisan am:repository ClassName`
- [ ] Services: `php artisan am:service ClassName`
- [ ] Traits: `php artisan am:trait ClassName`
- [ ] Transformers: `php artisan am:transformer ClassName`

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).