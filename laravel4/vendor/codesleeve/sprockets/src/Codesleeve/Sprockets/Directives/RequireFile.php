<?php namespace Codesleeve\Sprockets\Directives;

use Codesleeve\Sprockets\Exceptions\InvalidPathException;

class RequireFile extends BaseDirective
{
	public function process($filename)
	{
		$fullpath = $this->absolutePath($filename);

		if (!$fullpath) {
			throw new InvalidPathException("File not found in available paths: $filename");
		}

		return array($fullpath);
	}
}