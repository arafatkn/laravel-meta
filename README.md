![Laravel Meta](https://banners.beyondco.de/Laravel%20Meta.png?theme=light&packageManager=composer+require&packageName=arafatkn%2Flaravel-meta&pattern=architect&style=style_1&description=Save+metadata+%28key%2C+value%29+with+any+model&md=1&showWatermark=0&fontSize=100px&images=tag)

# Laravel Meta

[![Latest Stable Version](https://poser.pugx.org/arafatkn/laravel-meta/v)](//packagist.org/packages/arafatkn/laravel-meta)
[![License](https://poser.pugx.org/arafatkn/laravel-meta/license)](//packagist.org/packages/arafatkn/laravel-meta)
[![Total Downloads](https://poser.pugx.org/arafatkn/laravel-meta/downloads)](//packagist.org/packages/arafatkn/laravel-meta)

<a href="https://github.com/arafatkn/laravel-meta/issues"><img src="https://img.shields.io/github/issues/arafatkn/laravel-meta.svg" alt=""></a>
<a href="https://github.com/arafatkn/laravel-meta/stargazers"><img src="https://img.shields.io/github/stars/arafatkn/laravel-meta.svg" alt=""></a>
<a href="https://github.com/arafatkn/laravel-meta/network"><img src="https://img.shields.io/github/forks/arafatkn/laravel-meta.svg" alt=""></a>

Save metadata (key, value) with any model.

---
Sometimes, we may need to store few extra information for some objects.
In some situation, it's not good solution to add new columns.
This package can solve those issues.

The package will create a table in database named `laravel_metas` with key, value and metable column.
However, table name can be changed by updating table_name in `config/meta.php`.
N.B: After changing table_name, you need to delete the previous table (if exists) from DB and delete the `create_meta_table` row from `migrations` table.
Then re-run the `php artisan migrate` command again.

## Installation

You can install the package via composer:

```bash
composer require arafatkn/laravel-meta
```

If you are using Laravel Package Auto-Discovery, you don't need you to manually add the ServiceProvider.

#### Without auto-discovery:

If you don't use auto-discovery, add the below ServiceProvider to the `$providers` array in `config/app.php` file.

```php
Arafatkn\LaravelMeta\MetaServiceProvider::class,
```

If you want to change the meta table name, then first publish the config file.

```bash
php artisan vendor:publish --provider="Arafatkn\LaravelMeta\MetaServiceProvider"
```

Then, update the `table_name` value in `config/meta.php`.

Then you can run migration command to create database table.

```bash
php artisan migrate
```

## Usage

Add `Arafatkn\LaravelMeta\Metable` trait to models where you need.

```php
use \Illuminate\Database\Eloquent\Model;
use \Arafatkn\LaravelMeta\Metable;

class Post extends Model
{
    use Metable;
}
```

Then you can access like below:

```php
$post = Post::withMetas()->first();
```

```php
$post = Post::first();
$post->metas;
```

```php
$post = Post::first();
$post->saveMeta('meta_key_here', 'value_here');
$post->getMeta('meta_key_here', 'default_value');
$post->updateMeta('meta_key_here', 'value_here_new');
$post->deleteMeta('meta_key_here');
```

## Contribute

If you want to contribute, open a pull request by following Laravel contribution guide.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
