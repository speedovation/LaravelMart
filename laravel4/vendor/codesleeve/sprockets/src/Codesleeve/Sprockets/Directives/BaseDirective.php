<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Interfaces\DirectiveInterface;
use Codesleeve\Sprockets\Exceptions\UnknownSprocketsDirectiveException;

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
		$this->manifestRel = null;
	}

	/**
	 * Returns the mimetype for given manifest file
	 * or you can pass in a file path here
	 *
	 * @param  string $file
	 * @return string
	 */
	public function getMimeType($file = null)
	{
		$file = $file ? $file : $this->manifestFile;

		return $this->parser->mimeType($file);
	}

	/**
	 * Returns the absolute path of this filename. First we
	 * check to see if the path is found relative to the manifest
	 * so that let's us do relative manifest paths but if that
	 * fails then we fall back to checking all paths available.
	 *
	 * @param  string $filename
	 * @return
	 */
	public function absolutePath($filename)
	{
		$realpath = null;

		if (strpos($filename, '/') !== 0)
		{
			$realpath = $this->parser->absolutePath($this->relativePath($filename));
			$realpath = $realpath && realpath($realpath) ? realpath($realpath) : $realpath;
		}
		else
		{
			$filename = substr($filename, 1);
		}

		return $realpath ? $realpath : $this->parser->absolutePath($filename);
	}

	/**
	 * We don't recognize the directive name so we are falling back
	 *
	 * @param  string $params
	 * @throws UnknownSprocketsDirectiveException
	 */
	public function process($params)
	{
		throw new UnknownSprocketsDirectiveException;
	}

	/**
	 * Get the files within a folder
	 *
	 * @param  string $fullpath
	 * @return array
	 */
	public function getFilesArrayFromFolder($folder, $recursive = false, $mime = null, $loadDirectoriesFirst = false)
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

    	if (!$loadDirectoriesFirst) {
			$paths = array_merge($paths, $files);
    	}

		foreach ($directories as $directory)
		{
			$paths = array_merge($paths, $this->getFilesArrayFromFolder($directory, $recursive, $mime, $loadDirectoriesFirst));
		}

    	if ($loadDirectoriesFirst) {
			$paths = array_merge($paths, $files);
    	}

		return $paths;
	}

	/**
	 * Strips off the path makes this a relative path
	 *
	 * @return string
	 */
	protected function relativePath($filename)
	{
		$manifest = $this->getManifestRelativePath();

		return $manifest ? $manifest . '/' . $filename : $filename;
	}

	/**
	 * Gets us the path relative to the manifest against the
	 * array of all paths and base paths in the parser. This will
	 * likely be a manifest directory inside of
	 *
	 * 	<project>/app/assets/.../
	 *
	 * since most people store their manifest files in this location.
	 *
	 * @return string
	 */
	protected function getManifestRelativePath()
	{
		if ($this->manifestRel)
		{
			return $this->manifestRel;
		}

		$base = $this->parser->get('base_path') . '/';
		$paths = $this->parser->get('paths');
		$manifestRel = str_replace($base, '', $this->manifestDir);

		foreach ($paths as $path)
		{
			$newRel = str_replace($path . '/', '', $manifestRel);

			if ($newRel != $manifestRel)
			{
				$this->manifestRel = $newRel;
				return $this->manifestRel;
			}
		}

		return $this->manifestRel;
	}
}