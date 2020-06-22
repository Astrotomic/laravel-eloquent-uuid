# Laravel Eloquent UUID

[![Latest Version](http://img.shields.io/packagist/v/astrotomic/laravel-eloquent-uuid.svg?label=Release&style=for-the-badge)](https://packagist.org/packages/astrotomic/laravel-eloquent-uuid)
[![MIT License](https://img.shields.io/github/license/Astrotomic/laravel-eloquent-uuid.svg?label=License&color=blue&style=for-the-badge)](https://github.com/Astrotomic/laravel-eloquent-uuid/blob/master/LICENSE)
[![Offset Earth](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-green?style=for-the-badge)](https://plant.treeware.earth/Astrotomic/laravel-eloquent-uuid)

[![GitHub Workflow Status](https://img.shields.io/github/workflow/status/Astrotomic/laravel-eloquent-uuid/run-tests?style=flat-square&logoColor=white&logo=github&label=Tests)](https://github.com/Astrotomic/laravel-eloquent-uuid/actions?query=workflow%3Arun-tests)
[![StyleCI](https://styleci.io/repos/240738815/shield)](https://styleci.io/repos/240738815)
[![Total Downloads](https://img.shields.io/packagist/dt/astrotomic/laravel-eloquent-uuid.svg?label=Downloads&style=flat-square)](https://packagist.org/packages/astrotomic/laravel-eloquent-uuid)

A simple drop-in solution for UUID support in your Eloquent models.

## Installation

You can install the package via composer:

```bash
composer require astrotomic/laravel-eloquent-uuid
```

## Usage

You can use the provided `UsesUUID` trait to add an UUID attribute in addition to your normal primary key or use it as the primary key.

### Model

This will add an `uuid` attribute and auto-fill it before the model is created.

```php
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\UsesUUID;

class Post extends Model
{
    use UsesUUID;
}
```

If you want to customize the attribute name you can define a `$uuidName` property or override the `getUuidName()` method.

```php
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\UsesUUID;

class Post extends Model
{
    use UsesUUID;

    protected $uuidName = 'token';
}
```

And for sure you can use this trait to define your model primary key.

```php
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\UsesUUID;

class Post extends Model
{
    use UsesUUID;

    public $incrementing = false;

    protected $keyType = 'string';

    public function getUuidName(): string 
    {
        return $this->getKeyName();
    }
}
```

### Migration

Laravel provides an `uuid()` column type on the table `Blueprint` class.

```php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Schema::create('posts', function (Blueprint $table) {
    // ...
    $table->uuid('uuid')->unique();
    // ...
});
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
## Contributing

Please see [CONTRIBUTING](https://github.com/Astrotomic/.github/blob/master/CONTRIBUTING.md) for details. You could also be interested in [CODE OF CONDUCT](https://github.com/Astrotomic/.github/blob/master/CODE_OF_CONDUCT.md).
### Security

If you discover any security related issues, please email dev.gummibeer@gmail.com instead of using the issue tracker.

## Credits

- [Tom Witkowski](https://github.com/Gummibeer)
- [All Contributors](../../contributors)

## Alternatives

* [dyrynda/laravel-model-uuid](https://github.com/michaeldyrynda/laravel-model-uuid)
* [jamesmills/eloquent-uuid](https://github.com/jamesmills/eloquent-uuid)
* [goldspecdigital/laravel-eloquent-uuid](https://github.com/goldspecdigital/laravel-eloquent-uuid)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

You're free to use this package, but if it makes it to your production environment I would highly appreciate you buying the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to [plant trees](https://www.bbc.co.uk/news/science-environment-48870920). If you contribute to my forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees at [offset.earth/treeware](https://plant.treeware.earth/Astrotomic/laravel-eloquent-uuid)

Read more about Treeware at [treeware.earth](https://treeware.earth)
