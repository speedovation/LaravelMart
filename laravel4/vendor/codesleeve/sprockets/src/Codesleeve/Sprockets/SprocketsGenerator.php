<?php namespace Codesleeve\Sprockets;

use ReflectionClass, RecursiveIteratorIterator, RecursiveDirectoryIterator;
use Assetic\Asset\FileAsset;
use Codesleeve\Sprockets\Parsers\DirectivesParser;

class SprocketsGenerator implements Interfaces\GeneratorInterface
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
     * @param  filepath $absolutePath
     * @param  bool     $contact        allows us to turn concat on or off manually
     * @return FileAsset
     */
    public function file($absolutePath, $concat = null)
    {
        $concat = is_null($concat) ? $this->parser()->concat() : $concat;

        return new FileAsset($absolutePath, $this->filters($absolutePath, $concat));
    }

    /**
     * Returns the file wrapped around the server cache
     * so that we get a performance boost.
     *
     * @param  filepath $absolutePath
     * @return AssetCache
     */
    public function cachedFile($absolutePath)
    {
        $file = $this->file($absolutePath, false);

        return $this->parser()->serverCache($file);
    }

    /**
     * Returns the cached version of this absolutePath
     *
     * @param  string $absolutePath
     * @return string
     */
    public function cached($absolutePath, $concat = null)
    {
        $file = $this->file($absolutePath, $concat);

        if (!$this->parser()->cache())
        {
            return $file;
        }

        return $this->parser()->clientCache($file);
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

        if (!$concat)
        {
            return $filters;
        }

        // concatenate so we need to use the sprockets filter here
        $class = new ReflectionClass($this->parser()->sprockets_filter);
        $sprockets = $class->newInstanceArgs(array($this->parser(), $this));

        return array($sprockets);
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