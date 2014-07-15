<?php namespace Codesleeve\Sprockets\Interfaces;

interface StaticFilesGeneratorInterface
{
    /**
     * Generate all assets into the $absolutePath given
     * and return the list of those assets generated
     *
     * @param string  $absolutePath
     * @param boolean $override if false we only generate changes
     * @return array
     */
    public function generate($absolutePath);
}