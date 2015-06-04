<?php namespace Codesleeve\Sprockets;

class SprocketsParserTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new SprocketsParser($config);
    }

    public function testFiles()
    {
        $output = $this->parser->files('manifest7');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, array('/provider/assets/javascripts/jquery.js'));
    }

    public function testJavascriptFiles()
    {
        $output = $this->parser->javascriptFiles('manifest7');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, array('/provider/assets/javascripts/jquery.js'));
    }

    public function testStylesheetFiles()
    {
        $output = $this->parser->stylesheetFiles('manifest7');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, array('/provider/assets/stylesheets/twitter/bootstrap.min.css'));
    }

    public function testAbsolutePathToWebPath()
    {
        $absolutePath = $this->basePath . '/provider/assets/stylesheets/twitter/bootstrap.min.css';
        $output = $this->parser->absolutePathToWebPath($absolutePath);
        $this->assertEquals($output, '/assets/twitter/bootstrap.min.css');
    }

    public function testAbsoluteJavascriptPath()
    {
        $output = $this->parser->absoluteJavascriptPath('jquery.js');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, '/provider/assets/javascripts/jquery.js');
    }

    public function testAbsoluteStylesheetPath()
    {
        $output = $this->parser->absoluteStylesheetPath('twitter/bootstrap');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, '/provider/assets/stylesheets/twitter/bootstrap.min.css');
    }

    public function testAbsoluteFilePath()
    {
        $output = $this->parser->absoluteFilePath('manifest7.js');
        $output = $this->stripBasePath($output);
        $this->assertEquals($output, '/app/assets/javascripts/manifest7.js');
    }
}