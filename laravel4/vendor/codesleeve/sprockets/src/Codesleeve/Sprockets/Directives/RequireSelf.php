<?php namespace Codesleeve\Sprockets\Directives;

class RequireSelf extends BaseDirective
{
	public function process($param = null)
	{
		return array($this->manifestFile);
	}

}