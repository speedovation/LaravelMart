<?php namespace Codesleeve\Sprockets;

class PathParserTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/../fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new Parsers\PathParser($config);
    }

 	public function testAbsolutePath()
    {
    	$output = $this->parser->absolutePath('manifest7');
    	$this->assertEquals($this->stripBasePath($output), "/app/assets/javascripts/manifest7.js");

    	$output = $this->parser->absolutePath('manifest-does-not-exist');
    	$this->assertNull($output);
    }

 	public function testAbsolutePathWithStylesheetMime()
    {
    	$this->parser->mime = 'stylesheets';
    	$output = $this->parser->absolutePath('manifest7');
    	$this->assertEquals($this->stripBasePath($output), "/app/assets/stylesheets/manifest7.css");
    }

    public function testFileWithAbsolutePath()
    {
    	$output = $this->parser->fileWithAbsolutePath('app/application.css');
    	$output = $this->stripBasePath($output);
    	$this->assertEquals($output, '/app/assets/stylesheets/app/application.css');
    }

    public function testFileWithAbsolutePathWithFileThatDoesNotExist()
    {
    	$output = $this->parser->fileWithAbsolutePath('app/application-does-not-exist.css');
    	$this->assertNull($output);
    }

    public function testAbsolutePathToWebPath()
    {
    	$absolutePath = $this->parser->fileWithAbsolutePath('app/application.css');
		$output = $this->parser->absolutePathToWebPath($absolutePath);
		$this->assertEquals($output, "app/application.css");
    }

    public function testDirectoryWithAbsolutePath()
    {
        $absolutePath = $this->parser->directoryWithAbsolutePath('pickadate');
        $output = $this->parser->absolutePathToWebPath($absolutePath);
        $this->assertEquals($output, "pickadate");
    }
}