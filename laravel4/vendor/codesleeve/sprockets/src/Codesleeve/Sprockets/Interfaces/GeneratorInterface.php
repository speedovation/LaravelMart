<?php namespace Codesleeve\Sprockets\Interfaces;

interface GeneratorInterface
{
    /**
     * Return the javascript text for this absolutePath
     *
     * @param  string $absolutePath
     * @return string
     */
    public function javascript($absolutePath);

    /**
     * Return the stylesheet text for this
     *
     * @param  $absolutePath
     * @return string
     */
    public function stylesheet($absolutePath);

    /**
     * Returns this file for $absolutePath
     *
     * @param  filepath $absolutePath
     * @param  bool     $contact        allows us to turn concat on or off manually
     * @return FileAsset
     */
    public function file($absolutePath, $concat = null);

    /**
     * Returns the file wrapped around the server cache
     * so that we get a performance boost.
     *
     * @param  filepath $absolutePath
     * @return AssetCache
     */
    public function cachedFile($absolutePath);

    /**
     * Returns the cached version of this absolutePath
     *
     * @param  string $absolutePath
     * @return string
     */
    public function cached($absolutePath, $concat = null);
}