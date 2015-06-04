<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class RequireTree extends BaseDirective
{
	public function process($directory)
	{
		$realpath = $this->parser->directoryWithAbsolutePath($directory, $this->manifestDir);

		if (!$realpath) {
			throw new InvalidPathException('Cannot find directory path: ' . $directory);
		}

		$files = $this->getFilesArrayFromFolder($realpath, $recursive = true, $this->parser->mime, $directoriesFirst = false);

		return $files;
	}
}