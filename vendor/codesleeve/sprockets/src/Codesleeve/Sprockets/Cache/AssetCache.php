<?php namespace Codesleeve\Sprockets\Cache;

use Assetic\Asset\FileAsset;
use Assetic\Asset\AssetInterface;
use Assetic\Cache\CacheInterface;
use Assetic\Filter\FilterInterface;
use Assetic\Filter\HashableInterface;
use Codesleeve\Sprockets\Interfaces\AssetCacheInterface;

class AssetCache implements AssetCacheInterface
{
    /**
     * [__construct description]
     * @param AssetInterface $asset [description]
     * @param CacheInterface $cache [description]
     */
    public function __construct(AssetInterface $asset, CacheInterface $cache)
    {
        $this->asset = $asset;
        $this->cache = $cache;
    }

    /**
     * [ensureFilter description]
     * @param  FilterInterface $filter [description]
     * @return [type]                  [description]
     */
    public function ensureFilter(FilterInterface $filter)
    {
        $this->asset->ensureFilter($filter);
    }

    /**
     * [getFilters description]
     * @return [type] [description]
     */
    public function getFilters()
    {
        return $this->asset->getFilters();
    }

    /**
     * [clearFilters description]
     * @return [type] [description]
     */
    public function clearFilters()
    {
        $this->asset->clearFilters();
    }

    /**
     * [load description]
     * @param  [type] $additionalFilter [description]
     * @return [type]                   [description]
     */
    public function load(FilterInterface $additionalFilter = null)
    {
        $cacheKey = $this->getCacheKey();

        if ($this->cache->has($cacheKey))
        {
            $this->asset->setContent($this->cache->get($cacheKey));
            return;
        }

        $this->asset->load($additionalFilter);
        $this->cache->set($cacheKey, $this->asset->getContent());
    }

    /**
     * [dump description]
     * @param  [type] $additionalFilter [description]
     * @return [type]                   [description]
     */
    public function dump(FilterInterface $additionalFilter = null)
    {
        $cacheKey = $this->getCacheKey();

        if ($this->cache->has($cacheKey))
        {
            return $this->cache->get($cacheKey);
        }

        $content = $this->asset->dump($additionalFilter);
        $this->cache->set($cacheKey, $content);

        return $content;
    }

    /**
     * Allows us to remove a cached file
     *
     * @return [type] [description]
     */
    public function remove()
    {
        $cacheKey = $this->getCacheKey();

        if ($this->cache->has($cacheKey))
        {
            return $this->cache->remove($cacheKey);
        }

        return false;
    }

    /**
     * [getContent description]
     * @return [type] [description]
     */
    public function getContent()
    {
        return $this->asset->getContent();
    }

    /**
     * [setContent description]
     * @param [type] $content [description]
     */
    public function setContent($content)
    {
        $this->asset->setContent($content);
    }

    /**
     * [getSourceRoot description]
     * @return [type] [description]
     */
    public function getSourceRoot()
    {
        return $this->asset->getSourceRoot();
    }

    /**
     * [getSourcePath description]
     * @return [type] [description]
     */
    public function getSourcePath()
    {
        return $this->asset->getSourcePath();
    }

    /**
     * [getSourceDirectory description]
     * @return [type] [description]
     */
    public function getSourceDirectory()
    {
        return $this->asset->getSourceDirectory();
    }

    /**
     * [getTargetPath description]
     * @return [type] [description]
     */
    public function getTargetPath()
    {
        return $this->asset->getTargetPath();
    }

    /**
     * [setTargetPath description]
     * @param [type] $targetPath [description]
     */
    public function setTargetPath($targetPath)
    {
        $this->asset->setTargetPath($targetPath);
    }

    /**
     * [getLastModified description]
     * @return [type] [description]
     */
    public function getLastModified()
    {
        return $this->asset->getLastModified();
    }

    /**
     * [getVars description]
     * @return [type] [description]
     */
    public function getVars()
    {
        return $this->asset->getVars();
    }

    /**
     * [setValues description]
     * @param array $values [description]
     */
    public function setValues(array $values)
    {
        $this->asset->setValues($values);
    }

    /**
     * [getValues description]
     * @return [type] [description]
     */
    public function getValues()
    {
        return $this->asset->getValues();
    }

    /**
     * [getCacheKey description]
     * @param  string $salt [description]
     * @return [type]       [description]
     */
    public function getCacheKey($salt = '')
    {
        $asset = $this->asset;

        return $this->generateCacheKey($asset->getSourceRoot() . $asset->getSourcePath(), $asset->getLastModified(), $salt);
    }

    /**
     * [generateCacheKey description]
     *
     * @param  string $path
     * @param  string $lastModified
     * @param  string $salt
     * @return string
     */
    public function generateCacheKey($path, $lastModified, $salt = '')
    {
        return md5($path . $lastModified . $salt);
    }

    /**
     * [isCached description]
     * @return boolean [description]
     */
    public function isCached()
    {
        $cacheKey = $this->getCacheKey();

        return $this->cache->has($cacheKey);
    }

    /**
     * Shortcut for seeing if a file is cached or not
     *
     * @param  [type]  $file [description]
     * @return boolean       [description]
     */
    public function isFileCached($file)
    {
        $asset = new AssetCache(new FileAsset($file), $this->cache);

        $this->cache->setAssetCache($asset);

        return $asset->isCached();
    }


}