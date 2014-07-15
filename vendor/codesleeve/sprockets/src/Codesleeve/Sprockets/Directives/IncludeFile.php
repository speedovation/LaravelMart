<?php namespace Codesleeve\Sprockets\Directives;

class IncludeFile extends BaseDirective
{
	public function process($filename)
	{
		$fullpath = $this->absolutePath($filename);

		if (!$fullpath) {
			return array();
		}

		return array($fullpath);
	}

}