# simple-laravel-eloquent-uuid
A simple Trait to provide UUID support for your Eloquent models

A simple, automatic UUID generator for any model based on Laravel 7 and above, By using this package when each new entry you will get the following :

* Generate `uuid` automatically .
* Assign it to `uuid` field in database automatically.
* easy find it based `uuid` method.

## Installation

You can install the package via Composer:

``` bash
 composer require kadevland/simple-laravel-eloquent-uuid
```

## Usage

There are two ways to use this package:
 - with `uuid` in string format `Kadevland\Eloquent\Uuid\Traits\HasUuid`
 - with `uuid` in bytes format `Kadevland\Eloquent\Uuid\Traits\HasByteUuid`

Import trait and set key type string or uuid if use string format.

>By default UUID versions is v4
>
>You can also specify v1 UUIDs to be used by setting in config file.
 
### Uuid string format

 
#### Models

Use the HasUuid trait:

``` php
use Illuminate\Database\Eloquent\Model;
use Kadevland\Eloquent\Uuid\Traits\HasUuid;

class ExampleModel extends Model
{
  use HasUuid;
  
  protected $keyType = 'uuid';
  /* or
  protected $keyType = 'string';
  */       
}
```

### Uuid bytes format


#### Models

Use the HasByteUuid trait:

``` php
use Illuminate\Database\Eloquent\Model;
use Kadevland\Eloquent\Uuid\Traits\HasByteUuid;

class ExampleModel extends Model
{
  use HasByteUuid;

  protected $keyType = 'string';  

}
```

##Config 

You can publish the config file with:
```bash
php artisan vendor:publish --provider="kadevland/simple-laravel-eloquent-uuid" --tag="config"
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.