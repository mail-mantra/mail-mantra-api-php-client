
# Mail Mantra APIs Client Library for PHP #

[![Stable](https://img.shields.io/badge/stable-v0.0.2-blue.svg)](https://packagist.org/packages/mailmantra/apiclient#0.0.2) 
[![License](https://poser.pugx.org/razorpay/razorpay/license.svg)](https://packagist.org/packages/mailmantra/apiclient)

The Mail Mantra API Client Library enables you to work with Mail Mantra APIs such as SMS, Email, KYC or Pay on your server.

These client libraries are officially supported by Mail Mantra. However, the libraries are considered complete and are in maintenance mode. This means that we will address critical bugs and security issues but will not add any new features.

## Requirements ##
* [PHP 7.3 or higher](https://www.php.net/)

## Developer Documentation ##

The [docs folder](docs/) provides detailed guides for using this library.

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org/). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require mailmantra/apiclient
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

## Examples ##
See the [`examples/`](examples) directory for examples of the key client features. You can
view them in your browser by running the php built-in web server.

```
$ php -S localhost:8000 -t examples/
```

And then browsing to the host and port you specified
(in the above example, `http://localhost:8000`).

### Basic Example ###

```php
// include your composer dependencies
require_once 'vendor/autoload.php';

$mmSMS = new MailMantra\Sms("YOUR_APP_KEY");

$api_data = $mmSMS->balance();

echo "Balance: ".$api_data['message'];
 
```



