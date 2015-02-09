Custom whoops error style for Laravel framework.
======

With this package you can get the whoops errors style like the laravel's style in versions 4.0, 4.1 and 5.0.

### Preview

[![Whoops](https://raw.githubusercontent.com/pingpong-labs/whoops/master/shots/whoops.png)](https://raw.githubusercontent.com/pingpong-labs/whoops/master/shots/whoops.png)

### Installation

Via command line :

Laravel 4
```
composer require "pingpong/whoops:1.*"
```

Laravel 5
```
composer require "pingpong/whoops:2.0.*@dev"
```

After the package installed, add new service provider to your `providers` array.

```php
	'providers' => array(

		// ... 

		'Pingpong\Whoops\WhoopsServiceProvider',

	)
``` 
### Laravel4
Next, open terminal and publish the package's assets by run : 

```
php artisan asset:publish pingpong/whoops
```

Done.

### License

This package is open-sourced software licensed under [The BSD 3-Clause License](http://opensource.org/licenses/BSD-3-Clause)
