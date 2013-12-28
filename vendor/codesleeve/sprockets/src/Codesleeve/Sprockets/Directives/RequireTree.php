<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class RequireTree extends BaseDirective
{
	public function process($directory)
	{
		$realpath = realpath($this->manifestDir . '/' . $directory);

		if ($realpath === false) {
			throw new InvalidPathException('Cannot find directory path: ' . $directory);
		}

		$files = $this->getFilesArrayFromFolder($realpath, $recursive = true, $this->parser->mime);

		return $files;
	}
}