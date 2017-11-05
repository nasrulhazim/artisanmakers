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

On initial setup, run `php artisan artisanmakers:install`.

## Usage

Type `php artisan --help` for more details.

## Available Commands

- [x] Contracts: `php artisan make:contract ClassName`
- [x] Exceptions: `php artisan make:exception ClassName`
- [ ] Macros: `php artisan make:macro ClassName`
- [x] Presenters: `php artisan make:presenter ClassName`
- [x] Processors: `php artisan make:processor ClassName`
- [ ] Repositories: `php artisan make:repository ClassName`
- [ ] Resourceful: `php artisan make:resourceful ClassName`
- [ ] Services: `php artisan make:service ClassName`
- [ ] Traits: `php artisan make:trait ClassName`
- [ ] Transformers: `php artisan make:transformer ClassName`

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).