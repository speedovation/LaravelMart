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

    public function testExcludesStubbedFiles()
    {
        $output = $this->parser->getFilesArrayFromDirectives($this->basePath . '/app/assets/stylesheets/manifest8.css');
        $output = $this->stripBasePathFromArray($output);
        $expected = array(
            "/app/assets/stylesheets/app/application.css",
            "/app/assets/stylesheets/app/dashboard.css.less",
            "/app/assets/stylesheets/app/fonts.css",
            "/app/assets/stylesheets/app/home.index.css",
            "/app/assets/stylesheets/app/login.css.less",
            "/app/assets/stylesheets/app/main.css.less",
        );

        $this->assertEquals($expected, $output);
    }

    public function testGetDependenciesArrayFromDirectives()
    {
        $output = $this->parser->getDependenciesArrayFromDirectives($this->basePath . '/app/assets/stylesheets/manifest9.css');
        $output = $this->stripBasePathFromArray($output);

        $expected = array(
            "/app/assets/stylesheets/app/subdir/add-blog-modal.css.less",
            "/app/assets/stylesheets/app/subdir/foo/bar.css.less",
        );

        $this->assertEquals($expected, $output);
    }
}