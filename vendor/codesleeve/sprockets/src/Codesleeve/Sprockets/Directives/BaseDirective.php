<?php namespace Codesleeve\Sprockets\Directives;

use  Codesleeve\Sprockets\Interfaces\DirectiveInterface;

class BaseDirective implements DirectiveInterface
{
	/**
	 * Create a new Base Directive
	 * 
	 * @param Parser $parser       
	 * @param string $manifestFile 
	 */
	public function initialize($parser, $manifestFile)
	{
		$this->parser = $parser;
		$this->manifestFile = $manifestFile;
		$this->manifestDir = dirname($manifestFile);
	}

	/**
	 * We don't recognize the directive name so we are falling back
	 * 
	 * @param  string $params
	 * @return array
	 */
	public function process($params)
	{
		return array();
	}

	/**
	 * Get the files within a folder
	 * 
	 * @param  string $fullpath
	 * @return array          
	 */
	public function getFilesArrayFromFolder($folder, $recursive = false, $mime = null)
	{
		$paths = array();
		$files = array();
		$directories = array();

		if ($handle = opendir($folder))
		{
		    while (false !== ($path = readdir($handle))) 
		    {
		    	$fullpath = $folder . '/' . $path;
		        if ($recursive && is_dir($fullpath) && $path != '.' && $path != '..') {
		        	$directories[] = $fullpath;
		        } else if (is_file($fullpath) && $this->parser->hasValidExtension($fullpath, $mime)) {
		        	$files[] = $fullpath;
		        }

		    }
			closedir($handle);
		}

		sort($files);
    	sort($directories);

		$paths = array_merge($paths, $files);
		foreach($directories as $directory)
		{
			$paths = array_merge($paths, $this->getFilesArrayFromFolder($directory, $recursive, $mime));
		}

		return $paths;
	}

}