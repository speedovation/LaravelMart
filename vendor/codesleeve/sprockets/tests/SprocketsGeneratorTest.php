<?php namespace Codesleeve\Sprockets;

class SprocketsGeneratorTest extends TestCase
{ 
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;
        $config['cache'] = new Filters\NotCached;
 		$this->generator = new SprocketsGenerator($config);
    }

    public function testJavascript()
    {
		$output = $this->generator->javascript($this->basePath . '/app/assets/javascripts/manifest7.js');
		$this->assertContains('basic manifest file', $output);
    }

    public function testStylesheet()
    {
		$output = $this->generator->stylesheet($this->basePath . '/app/assets/stylesheets/manifest7.css');
		$this->assertContains('used by many different', $output);
    }

    public function testFile()
    {
		$output = $this->generator->file($this->basePath . '/app/assets/stylesheets/manifest7.css', true);
		$this->assertInstanceOf('Assetic\Asset\FileAsset', $output);
	}

}