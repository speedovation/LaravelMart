<?php namespace Codesleeve\Sprockets;

class DirectivesParserTest extends TestCase
{ 
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/../fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new Parsers\DirectivesParser($config);
    }

    public function testGetFilesArrayFromDirectives()
    {
    	$output = $this->parser->getFilesArrayFromDirectives($this->basePath . '/app/assets/javascripts/manifest7.js');
    	$output = $this->stripBasePathFromArray($output);

    	$this->assertEquals($output, array('/provider/assets/javascripts/jquery.js'));
    }
}