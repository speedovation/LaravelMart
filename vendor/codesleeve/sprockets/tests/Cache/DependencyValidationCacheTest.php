<?php namespace Codesleeve\Sprockets;

class DependencyValidationCacheTest extends TestCase
{
    public function setUp()
    {
        $basePath = realpath(__DIR__ . '/../fixtures');
        $this->config = include $basePath . '/config/config1.php';
        $this->config['base_path'] = $basePath;
    }

    public function testConstruction()
    {
        $this->cache();
    }

    public function testHasWhenAssetIsCached()
    {
        $output = $this->cache(true)->has('key');
        $this->assertTrue($output);
    }

    public function testHasWhenAssetIsCachedAndHasDependencyUncached()
    {
        $files = array('not cached');
        $output = $this->cache(true, $files, false)->has('key');
        $this->assertFalse($output);
    }

    public function testHasWhenAssetIsCachedAndHasDependencyCached()
    {
        $files = array('not cached');
        $output = $this->cache(true, $files, true)->has('key');
        $this->assertTrue($output);
    }

    public function testGetWorks()
    {
        $cache = $this->cache(true);

        $cache->cache->expects($this->once())
            ->method('get')
            ->with($this->equalTo('key'))
            ->will($this->returnValue('no foobar man!'));

        $output = $cache->get('key');
        $this->assertEquals('no foobar man!', $output);
    }

    public function testSetWorks()
    {
        $cache = $this->cache(true);

        $cache->cache->expects($this->once())
            ->method('set')
            ->with($this->equalTo('key'), $this->equalTo('value'))
            ->will($this->returnValue('no foobar man!'));

        $output = $cache->set('key', 'value');
        $this->assertEquals('no foobar man!', $output);
    }

    public function testRemoveWorks()
    {
        $cache = $this->cache(true);

        $cache->cache->expects($this->once())
            ->method('remove')
            ->with($this->equalTo('key'))
            ->will($this->returnValue('no foobar man!'));

        $output = $cache->remove('key');
        $this->assertEquals('no foobar man!', $output);
    }

    private function cache($has = false, $files = array(), $isFileCached = false)
    {
        $assetInterface = $this->getMock('Assetic\Asset\AssetInterface');
        $cacheInterface = $this->getMock('Assetic\Cache\CacheInterface');
        $assetCache = $this->getMock('Codesleeve\Sprockets\Cache\AssetCache', array(), array($assetInterface, $cacheInterface));
        $directivesParser = $this->getMock('Codesleeve\Sprockets\Parsers\DirectivesParser', array(), array($this->config));

        $cacheInterface->expects($this->any())
             ->method('has')
             ->will($this->returnValue($has));

        $directivesParser->expects($this->any())
            ->method('getDependenciesArrayFromDirectives')
            ->will($this->returnValue($files));

        $assetCache->expects($this->any())
            ->method('isFileCached')
            ->will($this->returnValue($isFileCached));

        $cache = new Cache\DependencyValidationCache($cacheInterface, $directivesParser, false);
        $cache->setAssetCache($assetCache);

        return $cache;
    }
}