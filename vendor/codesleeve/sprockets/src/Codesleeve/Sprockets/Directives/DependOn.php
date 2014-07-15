<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;
use Codesleeve\Sprockets\Parsers\DirectivesParser;

class DependOn extends BaseDirective
{
	/**
	 * Get a list of dependencies for given path
	 *
	 * @param  string $path
	 * @return array
	 */
	public function process($path)
	{
		$this->parser->mime = $this->getMimeType();

		$realpath = realpath($this->manifestDir . '/' . $path);

		if (is_dir($realpath))
		{
			return array('depend' => $this->getDirectory($realpath));
		}

		return array('depend' => $this->getFile($path));
	}

	/**
	 * Get list of files from a directory that are dependencies
	 *
	 * @param  file $realpath [description]
	 * @return
	 */
	protected function getDirectory($realpath)
	{
		return array_unique($this->getFilesArrayFromFolder($realpath, $recursive = true, $this->parser->mime, $directoriesFirst = false));
	}

	/**
	 * Get the absolute path to this file that is a dependency
	 *
	 * @param  string $path
	 * @return array
	 */
	protected function getFile($path)
	{
		$realpath = $this->absolutePath($path);

		if (!$realpath)
		{
			throw new InvalidPathException('Cannot find path: ' . $path);
		}

		return array($realpath);
	}
}