<?php namespace Codesleeve\Sprockets\Interfaces;

/**
 * This class is a facade class that encapsulates two
 * main responsibilities. Below they are listed...
 *
 */
interface ParserInterface
{
    /**
     * Returns an array of files of any mime type from
     * the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function files($filename);

    /**
     * Returns an array of javascript files that are extracted
     * from the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function javascriptFiles($filename);

    /**
     * Returns an array of stylesheet files that are extracted
     * from the manifest file passed into this function
     *
     * @param  string $filename
     * @return array
     */
    public function stylesheetFiles($filename);

    /**
     * Returns a short web path and is how you would access
     * this asset from a browser.
     *
     * @param  string $filename
     * @return string
     */
    public function absolutePathToWebPath($filename);

    /**
     * Returns the absolute path to this javascript filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteJavascriptPath($filename);

    /**
     * Returns the absolute path to this stylesheet filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteStylesheetPath($filename);

    /**
     * Returns any file with this absolute path that matches filename
     *
     * @param  string $filename
     * @return string
     */
    public function absoluteFilePath($filename);
}