<?php namespace Codesleeve\Sprockets;

class SprocketsFilterTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

    	$parser = new Parsers\DirectivesParser($config);
    	$generator = new SprocketsGenerator($config);
    	$this->filter = new SprocketsFilter($parser, $generator);
    }

    public function testFilterWorks()
    {
    	$asset = $this->getMock('Assetic\Asset\AssetInterface');

        $asset->expects($this->once())
                 ->method('getSourceRoot')
                 ->will($this->returnValue($this->basePath));

        $asset->expects($this->once())
                 ->method('getSourcePath')
                 ->will($this->returnValue('app/assets/javascripts/manifest7.js'));

        $asset->expects($this->once())
                 ->method('setContent');

    	$this->filter->filterDump($asset);
    }

}