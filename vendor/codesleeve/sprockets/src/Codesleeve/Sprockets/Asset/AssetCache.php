<?php namespace Codesleeve\Sprockets\Asset;

use Assetic\Asset\AssetInterface;
use Assetic\Cache\CacheInterface;
use Assetic\Filter\FilterInterface;
use Assetic\Filter\HashableInterface;

class AssetCache implements AssetInterface
{
    public function __construct(AssetInterface $asset, CacheInterface $cache)
    {
        $this->asset = $asset;
        $this->cache = $cache;
    }

    public function ensureFilter(FilterInterface $filter)
    {
        $this->asset->ensureFilter($filter);
    }

    public function getFilters()
    {
        return $this->asset->getFilters();
    }

    public function clearFilters()
    {
        $this->asset->clearFilters();
    }

    public function load(FilterInterface $additionalFilter = null)
    {
        $cacheKey = $this->getCacheKey();
        if ($this->cache->has($cacheKey)) {
            $this->asset->setContent($this->cache->get($cacheKey));

            return;
        }

        $this->asset->load($additionalFilter);
        $this->cache->set($cacheKey, $this->asset->getContent());
    }

    public function dump(FilterInterface $additionalFilter = null)
    {
        $cacheKey = $this->getCacheKey();
        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $content = $this->asset->dump($additionalFilter);
        $this->cache->set($cacheKey, $content);

        return $content;
    }

    public function remove()
    {
        // allows us to remove keys even when we are on
        // different environments (like if we want to remove in 'local')
        $this->cache->cacheOverride = true;

        $cacheKey = $this->getCacheKey();

        if ($this->cache->has($cacheKey)) {
            return $this->cache->remove($cacheKey);
        }

        return false;
    }

    public function getContent()
    {
        return $this->asset->getContent();
    }

    public function setContent($content)
    {
        $this->asset->setContent($content);
    }

    public function getSourceRoot()
    {
        return $this->asset->getSourceRoot();
    }

    public function getSourcePath()
    {
        return $this->asset->getSourcePath();
    }

    public function getSourceDirectory()
    {
        return $this->asset->getSourceDirectory();
    }

    public function getTargetPath()
    {
        return $this->asset->getTargetPath();
    }

    public function setTargetPath($targetPath)
    {
        $this->asset->setTargetPath($targetPath);
    }

    public function getLastModified()
    {
        return $this->asset->getLastModified();
    }

    public function getVars()
    {
        return $this->asset->getVars();
    }

    public function setValues(array $values)
    {
        $this->asset->setValues($values);
    }

    public function getValues()
    {
        return $this->asset->getValues();
    }

    public function getCacheKey($salt = '')
    {
        $asset = $this->asset;

        $cacheKey  = $asset->getSourceRoot();
        $cacheKey .= $asset->getSourcePath();
        $cacheKey .= $asset->getLastModified();

        return md5($cacheKey.$salt);
    }
}