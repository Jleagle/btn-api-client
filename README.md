btn-api-client
==============

[![Build Status (Scrutinizer)](https://scrutinizer-ci.com/g/Jleagle/btn-api-client/badges/build.png)](https://scrutinizer-ci.com/g/Jleagle/btn-api-client)
[![Code Quality (scrutinizer)](https://scrutinizer-ci.com/g/Jleagle/btn-api-client/badges/quality-score.png)](https://scrutinizer-ci.com/g/Jleagle/btn-api-client)
[![Latest Stable Version](https://poser.pugx.org/Jleagle/btn-api-client/v/stable.png)](https://packagist.org/packages/Jleagle/btn-api-client)
[![Latest Unstable Version](https://poser.pugx.org/Jleagle/btn-api-client/v/unstable.png)](https://packagist.org/packages/Jleagle/btn-api-client)

A helper class to access data from the BTN API (http://btnapps.net/)

### Usage

Instantiate Btn() with your API key:

```php
$btn = new \Jleagle\Btn\Btn($apiKey);
```

Get blog posts:

```php
try
{
  print_r($btn->getBlog());
}
catch(Exception $e)
{
  echo $e->getMessage();
}
```

