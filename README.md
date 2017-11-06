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

## Available Commands

- [x] Contracts: `php artisan make:contract ContractName`

- [x] Exceptions: `php artisan make:exception NewExceptionClassName`

- [ ] Macros: `php artisan make:macro ClassName`

- [x] Model: `php artisan make:mode ModelName` 
	- This will create models under `app/Models` directory instead of `app` directory by default.
	- **Register manually** in your application in `app/Console/Kernel.php` in `$commands` property. Not sure why the command didn't load in the package. Probably it's loaded, by overwrite by default `make:model` command.

	```php
	protected $commands = [
	    \NasrulHazim\ArtisanMakers\Console\Commands\MakeModelCommand::class,
	];
	```

- [ ] Observer: `php artisan make:observer ObserverClassName ModelToObserve`

	**TODO**

	- [x] Create `ObserverServiceProvider`
	- [x] Create `Observer` class
	- [ ] Register `ObserverServiceProvider` in `config/app.php`
	- [ ] Include model & observer namespace in `ObserverServiceProvider`
	- [ ] Bootstrap Observer in `ObserverServiceProvider`

- [x] Presenters: `php artisan make:presenter PresenterClassName`

- [x] Processors: `php artisan make:processor ProcessorClassName`

- [ ] Repositories: `php artisan make:repository RepositoryClassName`

- [ ] Resourceful: `php artisan make:resourceful ClassName`

- [x] Services: `php artisan make:service ServiceClassName`

- [x] Traits: `php artisan make:trait TraitClassName`

- [x] Transformers: `php artisan make:transformer TransformerClassName`

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).