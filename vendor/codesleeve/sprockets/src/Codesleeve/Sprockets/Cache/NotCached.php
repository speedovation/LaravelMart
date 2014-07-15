<?php namespace Codesleeve\Sprockets\Cache;

use Codesleeve\Sprockets\Interfaces\ClientCacheInterface;

class NotCached implements ClientCacheInterface
{
    public function getServerCache()
    {

    }

    public function setServerCache(\Assetic\Cache\CacheInterface $driver)
    {

    }

    public function getAssetCache()
    {

    }

    public function setAssetCache(\Assetic\Asset\AssetInterface $cache)
    {

    }

    public function has($key)
    {
        return false;   // always fetch the file, it isn't cached
    }

    public function get($key)
    {
        // we don't get anything, because don't cache
    }

    public function set($key, $value)
    {
        // nothing is ever set, because we don't cache
    }

    public function remove($key)
    {
        // nothing is ever removed because we don't cache
    }
}