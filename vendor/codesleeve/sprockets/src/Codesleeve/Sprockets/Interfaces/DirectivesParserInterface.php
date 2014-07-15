<?php namespace Codesleeve\Sprockets\Interfaces;

interface DirectivesParserInterface
{
    /**
     * Returns an array of all the files inside of this manifest file
     *
     * @param  string $filename
     * @return array
     */
    public function getFilesArrayFromDirectives($filename);

    /**
     * Returns an array of all files that this file depends upon
     *
     * @param  string $filename
     * @return array
     */
    public function getDependenciesArrayFromDirectives($filename, $recursive = true);
}