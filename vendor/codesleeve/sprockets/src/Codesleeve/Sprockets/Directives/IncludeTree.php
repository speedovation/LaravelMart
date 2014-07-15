<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class IncludeTree extends BaseDirective
{
	public function process($directory)
	{
		$realpath = $this->parser->directoryWithAbsolutePath($directory, $this->manifestDir);

		if (!$realpath) {
			return array();
		}

		$files = $this->getFilesArrayFromFolder($realpath, $recursive = true, $this->parser->mime, $directoriesFirst = false);

		return $files;
	}
}