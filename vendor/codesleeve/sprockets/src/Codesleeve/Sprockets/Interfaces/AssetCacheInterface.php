<?php namespace Codesleeve\Sprockets\Interfaces;

interface AssetCacheInterface extends \Assetic\Asset\AssetInterface
{
    /**
     * See if this asset is cached or not
     *
     * @return boolean
     */
    public function isCached();

    /**
     * Allows us to remove a cached file
     *
     * @return void
     */
    public function remove();

    /**
     * Allows us to get the cache key
     *
     * @param  string $salt
     * @return string
     */
    public function getCacheKey($salt = '');

    /**
     * See if file path is cached or not
     *
     * @param  [type]  $file [description]
     * @return boolean       [description]
     */
    public function isFileCached($file);

}