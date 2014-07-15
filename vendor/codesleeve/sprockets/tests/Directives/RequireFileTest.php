<?php namespace Codesleeve\Sprockets;

class RequireFileTest extends TestCase
{
    public function setUp()
    {
    	$this->basePath = realpath(__DIR__ . '/../fixtures');

    	$config = include $this->basePath . '/config/config1.php';
 		$config['base_path'] = $this->basePath;

 		$this->parser = new Parsers\DirectivesParser($config);

        $this->directive = new Directives\RequireFile;
        $this->directive->initialize($this->parser, $this->basePath . '/app/assets/javascripts/manifest7.js');
    }

    /**
     * Just make sure it doesn't throw some sort of exception or error
     *
     * @return void
     */
    public function testProcess()
    {
        $this->directive->process('manifest7');
    }

    public function testRequireCanBeRelative()
    {
        $this->directive->initialize($this->parser, $this->basePath . '/app/assets/stylesheets/app/main');

        // we try it relative to the manifest file... and it should work!
        $output = $this->directive->process('../app/subdir/foo');
        $output = $this->stripBasePathFromArray($output);

        $expected = array(
            '/app/assets/stylesheets/app/subdir/foo.css'
        );

        $this->assertEquals($expected, $output);

    }

}