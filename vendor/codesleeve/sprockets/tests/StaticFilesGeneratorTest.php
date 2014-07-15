<?php namespace Codesleeve\Sprockets;

use RecursiveIteratorIterator, RecursiveDirectoryIterator;

class StaticFilesGeneratorTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');
        $this->tempDir = __DIR__ . '/temp';
        $this->cache = new Cache\SimpleCache;

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;
        $config['cache_server'] = $this->cache;

 		$this->generator = new SprocketsGenerator($config);
 		$this->fileGenerator = new StaticFilesGenerator($this->generator);
    }

    public function tearDown()
    {
    	$this->removeDirectory($this->tempDir);
    }

    public function testGenerateAll()
    {
        $output = $this->fileGenerator->generate($this->tempDir);

        $this->assertContains('select2.css', $this->cache->data['asset_pipeline_generate_manifest']);

		$this->assertContains('/select2.css', $output);

        $this->assertContains('/app/bindings/data-colors.js', $output);
    }

    private function removeDirectory($directory)
    {
    	if (!is_dir($directory))
    	{
    		return;
    	}

		$it = new RecursiveDirectoryIterator($directory);
		$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);

		foreach ($files as $file)
		{
			if ($file->getFilename() === '.' || $file->getFilename() === '..') {
				continue;
			}

		    if ($file->isDir()){
        		rmdir($file->getRealPath());
    		} else {
        		unlink($file->getRealPath());
    		}
		}
		rmdir($directory);
    }
}
