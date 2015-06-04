<?php namespace Codesleeve\Sprockets\Interfaces;

interface ClientCacheInterface extends \Assetic\Cache\CacheInterface
{
    /**
     * Allows us to get the existing cache
     *
     * @return CacheInterface
     */
    public function getServerCache();

    /**
     * Allows us to delegate the cache driver to this client cache
     *
     * @param CacheInterface $driver
     */
    public function setServerCache(\Assetic\Cache\CacheInterface $driver);

    /**
     * Allows us to know our parent asset cache so we can do stuff like
     * last modified time
     *
     * @return AssetCache
     */
    public function getAssetCache();

    /**
     * Allows us to set our parent asset cache (from asset pipeline)
     * so we can do stuff like last modified time
     *
     * @param AssetInterface $cache
     */
    public function setAssetCache(\Assetic\Asset\AssetInterface $cache);
}