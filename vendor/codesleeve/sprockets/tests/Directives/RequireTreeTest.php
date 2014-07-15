<?php namespace Codesleeve\Sprockets;

class RequireTreeTest extends TestCase
{
    public function setUp()
    {
    	$this->basePath = realpath(__DIR__ . '/../fixtures');

    	$config = include $this->basePath . '/config/config1.php';
 		$config['base_path'] = $this->basePath;

 		$parser = new Parsers\DirectivesParser($config);

        $this->directive = new Directives\RequireTree;
        $this->directive->initialize($parser, $this->basePath . '/app/assets/javascripts/manifest7.js');
    }

    /**
     * Just make sure it doesn't throw some sort of exception or error
     *
     * @return void
     */
    public function testProcess()
    {
        $this->directive->process('.');
    }

}