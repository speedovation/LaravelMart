<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class Stub extends BaseDirective
{
	/**
	 * Return the excluded files for this given path
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
			return array('exclude' => $this->stubDirectory($realpath));
		}

		return array('exclude' => $this->stubFile($path));
	}

	/**
	 * Returns an exclusion for all files in this directory
	 *
	 * @param  directory $path
	 * @return array
	 */
	protected function stubDirectory($realpath)
	{
		return $this->getFilesArrayFromFolder($realpath, $recursive = true, $this->parser->mime, $directoriesFirst = false);
	}

	/**
	 * Returns an exclusion for this file
	 *
	 * @param  file $path
	 * @return array
	 */
	protected function stubFile($path)
	{
		$realpath = $this->absolutePath($path);

		if (!$realpath)
		{
			throw new InvalidPathException('Cannot find path: ' . $path);
		}

		return array($realpath);
	}
}