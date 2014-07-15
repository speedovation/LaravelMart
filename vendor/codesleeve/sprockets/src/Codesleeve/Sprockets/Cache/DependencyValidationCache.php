<?php namespace Codesleeve\Sprockets\Cache;

use Assetic\Cache\CacheInterface;
use Assetic\Filter\FilterInterface;
use Codesleeve\Sprockets\Parsers\DirectivesParser;

class DependencyValidationCache implements CacheInterface
{
    /**
     * Create new dependency validation cache. This class is a wrapper
     * around $this->cache and just checks
     *
     * @param CacheInterface $cache
     * @param DirectivesParser $parser
     * @param boolean $passthru
     */
    public function __construct(CacheInterface $cache, DirectivesParser $parser, $passthru = true)
    {
        $this->cache = $cache;
        $this->parser = $parser;
        $this->passthru = $passthru;
    }

    public function setAssetCache(AssetCache $asset)
    {
        $this->asset = $asset;
    }

    public function has($key)
    {
        $isCached = $this->cache->has($key);

        if ($this->passthru || $isCached === false)
        {
            return $isCached;
        }

        $file = $this->asset->getSourceRoot() . '/' . $this->asset->getSourcePath();

        return $this->checkAllDependenciesForCache($file);
    }

    public function get($key)
    {
        return $this->cache->get($key);
    }

    public function set($key, $value)
    {
        return $this->cache->set($key, $value);
    }

    public function remove($key)
    {
        return $this->cache->remove($key);
    }

    protected function checkAllDependenciesForCache($file)
    {
        $dependencies = $this->parser->getDependenciesArrayFromDirectives($file);

        foreach ($dependencies as $dependency)
        {
            if (!$this->asset->isFileCached($dependency))
            {
                return false;
            }
        }

        return true;
    }
}