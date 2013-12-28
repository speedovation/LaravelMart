<?php namespace Codesleeve\Sprockets\Interfaces;

/**
 * This class is a facade class that encapsulates two 
 * main responsibilities. Below they are listed...
 *
 */
interface ParserInterface
{
    // get files from manifest filename
    public function files($filename);
    public function javascriptFiles($filename);
    public function stylesheetFiles($filename);

    // get absolute path to filename
    public function absolutePathToWebPath($filename);
    public function absoluteJavascriptPath($filename);
    public function absoluteStylesheetPath($filename);
}