Quickly store and retrieve arrays. Persist data with two methods, set and get. Enabling OPcache is recommended for speed.

I created this while looking for a quick and simple persistent data store.
This is a quick and dirty class based on what I learned from the following blog post.

Thanks to: https://blog.graphiq.com/500x-faster-caching-than-redis-memcache-apc-in-php-hhvm-dcd26e8447ad

Quick Use Sections:
* [Installation](#installation)
* [Usage Examples](#usage-examples)


You can set an array to the tmp folder in your file system and load it
from the file sytem.  Arrays are Encoded when written and they are Parsed
when reading.


### License
MIT - MIT License

File: [LICENSE](LICENSE)

### Installation
###### Composer
```
composer require somephp/arraycache:dev-master
```

With the development version, a writable "tmp" folder must exist in the
directory where your script is called from.
```
mkdir tmp; chmod 777 tmp;
```

## Usage Examples
The following examples require a writable "tmp" folder in the directory where
the script was called from.

### Example #1 Basic. Persistance: save an array.
```php
<?php
use SomePHP\ArrayCache\Cache;
$array = array_fill(0, 10000000, 'Yo');
Cache::set('my_var', $array);
```

### Example #2 Basic. Persistance: load an array.
```php
<?php
use SomePHP\ArrayCache\Cache;
$var = Cache::get('my_var');
echo '<pre>'. print_r($var, true) .'</pre>';
```



### Contents
| Resource | Description |
| -------- | ----------- |
|  | |

### Contributions
Suggestions and code modifications are welcome.  Create a pull/merge request, and tell me what you are thinking.
