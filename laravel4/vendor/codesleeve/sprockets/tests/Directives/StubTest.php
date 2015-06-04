<?php namespace Codesleeve\Sprockets;

class StubTest extends TestCase
{
    public function setUp()
    {
    	$this->basePath = realpath(__DIR__ . '/../fixtures');

    	$config = include $this->basePath . '/config/config1.php';
 		$config['base_path'] = $this->basePath;

 		$parser = new Parsers\DirectivesParser($config);

        $this->directive = new Directives\Stub;
        $this->directive->initialize($parser, $this->basePath . '/app/assets/stylesheets/manifest8.css');
    }

    /**
     * Stub out a directory
     *
     * @return void
     */
    public function testProcessForDirectory()
    {
        $outcome = $this->stripBasePathFromArray($this->directive->process('app/subdir'));

        $expected = array(
            'exclude' => array(
                '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
                '/app/assets/stylesheets/app/subdir/foo.css',
                '/app/assets/stylesheets/app/subdir/foo/bar.css.less',
            )
        );

        $this->assertEquals($outcome, $expected);
    }

    /**
     * Stub out a single file
     *
     * @return void
     */
    public function testProcessForFile()
    {
        $outcome = $this->stripBasePathFromArray($this->directive->process('app/subdir/add-blog-modal'));

        $expected = array(
            'exclude' => array(
                '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
            )
        );

        $this->assertEquals($outcome, $expected);
    }

    /**
     * Stub out an invalid path
     * @expectedException Codesleeve\Sprockets\Exceptions\InvalidPathException
     * @return void
     */
    public function testProcessForInvalidPath()
    {
        $outcome = $this->directive->process('app/subdir/foo1');
    }

}