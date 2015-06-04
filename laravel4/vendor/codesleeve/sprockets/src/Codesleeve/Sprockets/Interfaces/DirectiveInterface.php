<?php namespace Codesleeve\Sprockets\Interfaces;

/**
 * This class is a facade class that encapsulates two
 * main responsibilities. Below they are listed...
 *
 */
interface DirectiveInterface
{
    public function initialize($parser, $manifestFilename);
    public function process($params);
}