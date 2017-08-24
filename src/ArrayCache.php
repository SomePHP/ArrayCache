<?php
/**
 * This file was thrown together while looking for a quick and simple 
 * persistant data store.
 * This is a simple class based on what I learned from the following blog post.
 *
 * Thanks to: https://blog.graphiq.com/500x-faster-caching-than-redis-memcache-apc-in-php-hhvm-dcd26e8447ad
 * 
 */
namespace SomePHP\ArrayCache;
/**
 * Quickly store and retreive arrays. Easily persist data with two
 * methods, set and get. Enabling Opcache is recommended for speed.
 */
class Cache {
  /**
   * Encode and save an array to the file system in short form PHP/JSON.
   *
   * @param string  $key The name of your data in the cache. 
   * @param mixed[] $val Only supports single dimension indexed arrays.
   */
  static function set($key, $val) {
    if (! is_array($val) || ! $j = json_encode($val)) {
      return false;
    }
    return file_put_contents("tmp/$key.json", "<?php \$t=$j;", LOCK_EX);
  }

  /**
   * Load a variable from the file system or opcache.
   */
  static function get($key) {
    @include "tmp/$key";
    return isset($t) ? $t : false;
  }
}
