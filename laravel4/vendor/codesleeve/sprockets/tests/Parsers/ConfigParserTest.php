<?php namespace Codesleeve\Sprockets;

class ConfigParserTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/../fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new Parsers\ConfigParser($config);
    }

    public function testPaths()
    {
        $this->assertEquals($this->parser->paths(), array(
            'app/assets/javascripts',
            'app/assets/stylesheets',
            'app/assets/images',
            'lib/assets/javascripts',
            'lib/assets/stylesheets',
            'lib/assets/images',
            'provider/assets/javascripts',
            'provider/assets/stylesheets',
            'provider/assets/images'
        ));
    }

    public function testConcat()
    {
    	$this->assertEquals($this->parser->concat(), false);
    }

    public function testGet()
    {
    	$p = $this->parser;

    	$this->assertEquals($p->get('environment'), 'local');
    	$this->assertNull($p->get('foobar'));
    	$this->assertEquals($p->get('foobar', 'foobar'), 'foobar');
    	$this->assertEquals($p->get('routing.prefix'), '/assets');
    	$this->assertEquals($p->get('routing'), array('prefix' => '/assets'));
    }

    public function testMagicGet()
    {
    	$p = $this->parser;

    	$this->assertEquals($p->environment, 'local');
    	$this->assertNull($p->foobar);
    	$this->assertEquals($p->routing->prefix, '/assets');
    	$this->assertEquals($p->routing, new Parsers\ConfigParser(array('prefix' => '/assets')));
    }
}