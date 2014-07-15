<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class IncludeDirectory extends BaseDirective
{
	public function process($directory)
	{
		$realpath = $this->parser->directoryWithAbsolutePath($directory, $this->manifestDir);

		if (!$realpath) {
			return array();
		}

		$files = $this->getFilesArrayFromFolder($realpath, $recursive = false, $this->parser->mime);

		return $files;
	}
}