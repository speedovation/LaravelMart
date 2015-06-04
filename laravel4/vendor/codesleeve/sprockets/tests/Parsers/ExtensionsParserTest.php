<?php namespace Codesleeve\Sprockets;

class ExtensionsParserTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/../fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new Parsers\ExtensionsParser($config);
    }

    public function testExtensions()
    {
    	$output = $this->parser->extensions();
    	$this->assertEquals($output, array(
			'.min.js',
			'.min.css',
			'.js',
			'.js.coffee',
			'.coffee',
			'.css',
			'.css.less',
			'.css.scss',
			'.less',
			'.scss',
			'.html'
    	));
	}

	public function testExtensionsWithMimeType()
	{
		$output = $this->parser->extensions('javascripts');
		$this->assertEquals($output, array(
			'.min.js',
			'.js',
			'.js.coffee',
			'.coffee',
			'.html',
		));
	}

    public function testExtensionForFile()
    {
    	$p = $this->parser;
		$this->assertEquals($p->extensionForFile('manifest7'), '');
		$this->assertEquals($p->extensionForFile('manifest7.test'), '.test');
		$this->assertEquals($p->extensionForFile('manifest7.test.coffee'), '.coffee');
		$this->assertEquals($p->extensionForFile('manifest7.js.coffee'), '.js.coffee');
		$this->assertEquals($p->extensionForFile('manifest7.css.less'), '.css.less');
		$this->assertEquals($p->extensionForFile('manifest7.css1.less'), '.less');
    }

    public function testHasValidExtension()
    {
    	$p = $this->parser;
		$this->assertFalse($p->hasValidExtension('manifest7', null));
		$this->assertFalse($p->hasValidExtension('manifest7.js1', null));
		$this->assertFalse($p->hasValidExtension('manifest7.js', 'stylesheets'));
		$this->assertTrue($p->hasValidExtension('manifest7.js', 'javascripts'));
		$this->assertTrue($p->hasValidExtension('manifest7.js.coffee', null));
    }

    public function testStripOffExtensions()
    {
    	$p = $this->parser;
    	$this->assertEquals($p->stripOffExtensions('manifest7'), 'manifest7');
    	$this->assertEquals($p->stripOffExtensions('manifest7.js1'), 'manifest7.js1');
    	$this->assertEquals($p->stripOffExtensions('manifest7.js'), 'manifest7');
    	$this->assertEquals($p->stripOffExtensions('manifest7.js.coffee'), 'manifest7');
    }

    public function testMimeType()
    {
    	$p = $this->parser;
		$this->assertNull($p->mimeType('manifest7'));
		$this->assertNull($p->mimeType('manifest7.js1'));
		$this->assertNull($p->mimeType('manifest7.css1'));
		$this->assertEquals($p->mimeType('manifest7.js'), 'javascripts');
		$this->assertEquals($p->mimeType('manifest7.css.less'), 'stylesheets');
    }
}