<?php namespace Codesleeve\Sprockets;

use ReflectionClass;
use Assetic\Asset\FileAsset;
use Codesleeve\Sprockets\Asset\AssetCache;
use Codesleeve\Sprockets\Parsers\DirectivesParser;

class SprocketsGenerator
{
    /**
     * Create a new sprockets generator. This will apply the 
     * sprockets assetic filter to generate parse out 
     * 
     * @param array $config [description]
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Return the javascript text for this absolutePath
     * 
     * @param  string $absolutePath
     * @return string
     */
    public function javascript($absolutePath)
    {
        return $this->cached($absolutePath)->dump();
    }

    /**
     * Return the stylesheet text for this 
     * 
     * @param  $absolutePath
     * @return string
     */
    public function stylesheet($absolutePath)
    {
        return $this->cached($absolutePath)->dump();
    }

    /**
     * Returns this file for $absolutePath
     * 
     * @param  [type] $absolutePath [description]
     * @return [type]               [description]
     */
    public function file($absolutePath, $concat = null)
    {
        $concat = is_null($concat) ? $this->parser()->concat() : $concat;

        return new FileAsset($absolutePath, $this->filters($absolutePath, $concat));
    }

    /**
     * Return the filters for this specific file
     * 
     * @param  $absolutePath
     * @return array             
     */
    protected function filters($absolutePath, $concat = false)
    {
        $extension = $this->parser()->extensionForFile($absolutePath);

        $filters = isset($this->parser()->filters[$extension]) ? $this->parser()->filters[$extension] : array();

        if (!$concat) {
            return $filters;
        }

        $filter = $this->parser()->sprockets_filter ? $this->parser()->sprockets_filter : '\Codesleeve\Sprockets\SprocketsFilter';
        $class = new ReflectionClass($filter);
        $sprockets = $class->newInstanceArgs(array($this->parser(), $this));

        return array($sprockets);
    }

    /**
     * Returns the cached version of this absolutePath
     * 
     * @param  string $absolutePath
     * @return string
     */
    public function cached($absolutePath)
    {
        $file = $this->file($absolutePath);

        return new AssetCache($file, $this->parser()->get('cache'));
    }

    /**
     * Gets us a new parser
     * 
     * @return DirectivesParser
     */
    protected function parser()
    {
        return new DirectivesParser($this->config);
    }
}