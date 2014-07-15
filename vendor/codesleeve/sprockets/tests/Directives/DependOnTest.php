<?php namespace Codesleeve\Sprockets;

class DependOnTest extends TestCase
{
    public function setUp()
    {
    	$this->basePath = realpath(__DIR__ . '/../fixtures');

    	$config = include $this->basePath . '/config/config1.php';
 		$config['base_path'] = $this->basePath;

 		$parser = new Parsers\DirectivesParser($config);

        $this->directive = new Directives\DependOn;
        $this->directive->initialize($parser, $this->basePath . '/app/assets/stylesheets/manifest9.css');
    }

    /**
     * See how it responds to a file
     *
     * @return void
     */
    public function testProcessForFile()
    {
        $output = $this->stripBasePathFromArray($this->directive->process('app/subdir/add-blog-modal'));

        $expected = array(
            'depend' => array(
                '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
            )
        );

        $this->assertEquals($output, $expected);
    }

    /**
     * See how it responds to a directory
     *
     * @return void
     */
    public function testProcessForDirectory()
    {
        $output = $this->stripBasePathFromArray($this->directive->process('app/subdir'));

        $expected = array(
            'depend' => array(
                "/app/assets/stylesheets/app/subdir/add-blog-modal.css.less",
                "/app/assets/stylesheets/app/subdir/foo.css",
                "/app/assets/stylesheets/app/subdir/foo/bar.css.less",
            )
        );

        $this->assertEquals($output, $expected);
    }

    /**
     * See how it responds to an invalid path
     *
     * @expectedException Codesleeve\Sprockets\Exceptions\InvalidPathException
     * @return void
     */
    public function testProcessForInvalidPath()
    {
        $output = $this->directive->process('invalid/path');
    }
}