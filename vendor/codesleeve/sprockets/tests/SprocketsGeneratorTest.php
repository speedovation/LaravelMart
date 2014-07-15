<?php namespace Codesleeve\Sprockets;

class SprocketsGeneratorTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;
 		$this->generator = new SprocketsGenerator($config);
    }

    public function testJavascript()
    {
		$output = $this->generator->javascript($this->basePath . '/app/assets/javascripts/manifest7.js');

		$this->assertContains('used as a basic manifest file', $output);
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

    public function testJavascriptProduction()
    {
        $this->generator->config['environment'] = "production";

        $output = $this->generator->javascript($this->basePath . '/app/assets/javascripts/manifest7.js');

        $this->assertContains(' * jQuery JavaScript Library v1.10.2', $output);
    }

    public function testJavascriptUsesCachingForConcatenation()
    {
        $this->generator->config['concat'] = array($this->generator->config['environment']);
        $this->generator->config['cache_server'] = $this->serverCache();

        $output = $this->generator->javascript($this->basePath . '/app/assets/javascripts/manifest7.js');
        $this->assertEquals('fooly cooly', $output);
    }

    public function testConcatenationOnJavascript()
    {
        $this->generator->config['environment'] = "production";

        $output = $this->generator->javascript($this->basePath . '/app/assets/javascripts/manifest11.js');

        $this->assertEquals(substr_count($output, ';'), 2);
    }


    public function testThatAManifestThatIncludesAFileThatDependsOnAnotherFileWorks()
    {
        $cache = $this->getMock('\Assetic\Cache\CacheInterface');

        $cache->expects($this->any())
            ->method('has')
            ->will($this->returnValue(true));

        $cache->expects($this->any())
            ->method('get')
            ->will($this->returnValue('no recursion man'));

        $this->generator->config['concat'] = array($this->generator->config['environment']);
        $this->generator->config['cache_server'] = $cache;

        $output = $this->generator->stylesheet($this->basePath . '/app/assets/stylesheets/manifest10.css');

        $this->assertEquals('no recursion man', $output);
    }

    /**
     * Mock server cache object for testing with
     *
     * @param  boolean $has
     * @return Assetic\Cache\CacheInterface
     */
    protected function serverCache($has = true)
    {
        $cache = $this->getMock('\Assetic\Cache\CacheInterface');

        $cache->expects($this->once())
            ->method('has')
            ->will($this->returnValue($has));

        $cache->expects($this->once())
            ->method('get')
            ->will($this->returnValue('fooly cooly'));

        return $cache;
    }
}