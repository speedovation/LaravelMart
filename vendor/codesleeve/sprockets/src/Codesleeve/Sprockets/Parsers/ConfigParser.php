<?php namespace Codesleeve\Sprockets\Parsers;

use Assetic\Asset\FileAsset;
use Codesleeve\Sprockets\Cache\AssetCache;
use Codesleeve\Sprockets\Cache\DependencyValidationCache;

class ConfigParser extends \ArrayObject
{
    public $mime = null;

    /**
     * Create a new parser config object
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);
        $this->config = $config;
    }

    /**
     * Allows the object to be traversed via object notation,
     * so if we had like $config['paths']['first'] then we can
     * do like $config['paths']['first'] or $config->paths->first
     *
     * @param  string $value
     * @return self or typeof ($value)
     */
    public function __get($value)
    {
        $value = $this->get($value);

        if (is_array($value)) {
            return new self($value);
        }

        return $value;
    }

    /**
     * Get an index of the array. Handles dot notation too.
     *
     * @param  string $path
     * @return array
     */
    public function get($path = '', $default = null)
    {
        if (!$path) {
            return $this->config;
        }

        $paths = explode('.', $path);
        $config = $this->config;

        foreach ($paths as $path)
        {
            if (!isset($config[$path])) {
                return $default;
            }

            $config = $config[$path];
        }

        return $config;
    }

    /**
     * Returns all the paths for this configuration
     *
     * @return array
     */
    public function paths()
    {
        return $this->get('paths');
    }

    /**
     * Returns if we should concat or not
     *
     * @return bool
     */
    public function concat()
    {
        return in_array($this->get('environment', 'production'), $this->get('concat', array('production')));
    }

    /**
     * Returns if we should cache or not
     *
     * @return bool
     */
    public function cache()
    {
        return in_array($this->get('environment', 'production'), $this->get('cache', array('production')));
    }

    /**
     * Returns the server side cache for $files
     *
     * If we are not caching then we need to check
     * all files for dependencies.
     *
     * @return AssetCache
     */
    public function serverCache(FileAsset $files)
    {
        $driver = new DependencyValidationCache($this->get('cache_server'), $this, $this->cache());

        $cache = new AssetCache($files, $driver);

        $driver->setAssetCache($cache);

        return $cache;
    }

    /**
     * Returns the client cache for $files
     *
     * @param  FileAsset $files
     * @return AssetCache
     */
    public function clientCache(FileAsset $files)
    {
        $client = $this->get('cache_client');

        $server = $this->get('cache_server');

        $cache = new AssetCache($files, $client);

        $client->setServerCache($server);

        $client->setAssetCache($cache);

        return $cache;
    }

    /**
     * Strip off the prefix of this filename if it is there
     *
     * @param  {[type]} $filename [description]
     * @return {[type]}           [description]
     */
    protected function stripFromBeginning($prefix, $str)
    {
        if (substr($str, 0, strlen($prefix)) == $prefix) {
            $str = substr($str, strlen($prefix));
        }

        return $str;
    }

    /**
     * Strip off the postfix of this filename if it is there
     *
     * @param  {[type]} $filename [description]
     * @return {[type]}           [description]
     */
    protected function stripFromEnding($postfix, $str)
    {
        $length = strlen($str) - strlen($postfix);
        if (substr($str, $length, strlen($postfix)) == $postfix) {
            $str = substr($str, 0, $length);
        }

        return $str;
    }
}