<?php namespace Codesleeve\Sprockets;

class IncludeFileTest extends TestCase
{
    public function setUp()
    {
    	$this->basePath = realpath(__DIR__ . '/../fixtures');

    	$config = include $this->basePath . '/config/config1.php';
 		$config['base_path'] = $this->basePath;

 		$parser = new Parsers\DirectivesParser($config);

        $this->directive = new Directives\IncludeFile;
        $this->directive->initialize($parser, $this->basePath . '/app/assets/javascripts/manifest7.js');
    }

    /**
     * @return void
     */
    public function testProcess()
    {
        $output = $this->stripBasePathFromArray($this->directive->process('manifest8'));
        $this->assertEquals(array('/app/assets/javascripts/manifest8.js'), $output);
    }

}