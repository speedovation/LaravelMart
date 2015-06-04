<?php namespace Codesleeve\Sprockets;

use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * This is here so we don't erorr out on phpunit
     * because this class has no tests.
     *
     * @return void
     */
    public function testBlank()
    {

    }

    /**
     * Helper function to take out the base path from
     * a directory string
     *
     * @param  [type] $dir [description]
     * @return [type]      [description]
     */
    protected function stripBasePath($dir)
    {
        return str_replace($this->basePath, '', $dir);
    }

    /**
     * Helper function to take out the base path from an
     * array of directories
     *
     * @param  [type] $dirs [description]
     * @return [type]       [description]
     */
    protected function stripBasePathFromArray($dirs)
    {
    	$newDirs = array();
    	foreach ($dirs as $key => $value)
    	{
    		$newDirs[$key] = str_replace($this->basePath, '', $value);
    	}
    	return $newDirs;
    }
}
