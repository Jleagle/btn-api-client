btn-api-client
==============

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

