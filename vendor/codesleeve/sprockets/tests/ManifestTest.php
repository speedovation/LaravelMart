<?php namespace Codesleeve\Sprockets;

class ManifestTest extends TestCase
{
    public function setUp()
    {
        $this->basePath = realpath(__DIR__ . '/fixtures');

        $config = include $this->basePath . '/config/config1.php';
        $config['base_path'] = $this->basePath;

 		$this->parser = new SprocketsParser($config);
    }

    public function testJavascriptManifest1()
    {
    	$output = $this->parser->javascriptFiles('manifest1');
    	$output = $this->stripBasePathFromArray($output);
    	$this->assertEquals($output, array(
			"/provider/assets/javascripts/jquery.js",
			"/provider/assets/javascripts/jquery-ui.js",
			"/provider/assets/javascripts/jquery.form.js",
			"/provider/assets/javascripts/jquery.bootstraper.js",
			"/provider/assets/javascripts/jquery.typing-0.2.0.min.js"
    	));
    }

    public function testJavascriptManifest2()
    {
    	$output = $this->parser->javascriptFiles('manifest2');
    	$output = $this->stripBasePathFromArray($output);
    	$this->assertEquals($output, array(
            '/app/assets/javascripts/app/bindings/data-changer.js',
            '/app/assets/javascripts/app/bindings/data-colors.js.coffee',
            '/provider/assets/javascripts/jquery.js',
    	));
    }

    public function testJavascriptManifest3()
    {
        $output = $this->parser->javascriptFiles('manifest3');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/javascripts/jquery.js',
            '/app/assets/javascripts/app/bindings/data-changer.js',
            '/app/assets/javascripts/app/bindings/data-colors.js.coffee',
            '/app/assets/javascripts/app/bindings/foobar/bar.js',
            '/app/assets/javascripts/app/bindings/foobar/foo.js.coffee',
            '/app/assets/javascripts/app/bindings/foobar/test spaces.js',
            '/app/assets/javascripts/app/bindings/foobar/bar/lots_of_recursion.js',
            '/app/assets/javascripts/app/bindings/subdir/data-foobar.js',
            '/app/assets/javascripts/app/bindings/subdir/data-model.js',
        ));
    }

    public function testJavascriptManifest4()
    {
        $output = $this->parser->javascriptFiles('manifest4');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/javascripts/jquery.js',
            '/app/assets/javascripts/app/bindings/data-changer.js',
            '/app/assets/javascripts/app/bindings/data-colors.js.coffee',
            '/app/assets/javascripts/app/bindings/foobar/bar.js',
            '/app/assets/javascripts/app/bindings/foobar/foo.js.coffee',
            '/app/assets/javascripts/app/bindings/foobar/test spaces.js',
            '/app/assets/javascripts/app/bindings/foobar/bar/lots_of_recursion.js',
            '/app/assets/javascripts/app/bindings/subdir/data-foobar.js',
            '/app/assets/javascripts/app/bindings/subdir/data-model.js',
            '/app/assets/javascripts/manifest4.js'
        ));
    }

    /**
     * @expectedException Codesleeve\Sprockets\Exceptions\InvalidPathException
     */
    public function testJavascriptManifest5()
    {
        $output = $this->parser->javascriptFiles('manifest5');
    }

    /**
     * @expectedException Codesleeve\Sprockets\Exceptions\InvalidPathException
     */
    public function testJavascriptManifest6()
    {
        $output = $this->parser->javascriptFiles('manifest6');
    }

    public function testJavascriptManifest8()
    {
        $output = $this->parser->javascriptFiles('manifest8');
        $output = $this->stripBasePathFromArray($output);

        $this->assertEquals($output[0], '/app/assets/javascripts/app/bindings/data-changer.js');
        $this->assertEquals($output, array_unique($output));
    }

    public function testJavascriptAppApplication()
    {
        $output = $this->parser->javascriptFiles('app/application');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/app/assets/javascripts/app/bindings/data-changer.js',
            '/app/assets/javascripts/app/bindings/data-colors.js.coffee',
        ));
    }

    public function testStylesheetManifest1()
    {
        $output = $this->parser->stylesheetFiles('manifest1');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/stylesheets/twitter/bootstrap.min.css',
            '/provider/assets/stylesheets/font/font-awesome.css',
        ));
    }

    public function testStylesheetManifest2()
    {
        $output = $this->parser->stylesheetFiles('manifest2');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/stylesheets/twitter/bootstrap.min.css',
            '/provider/assets/stylesheets/font/font-awesome.css',
            '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
            '/app/assets/stylesheets/app/subdir/foo.css',
        ));
    }

    public function testStylesheetManifest3()
    {
        $output = $this->parser->stylesheetFiles('manifest3');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/stylesheets/twitter/bootstrap.min.css',
            '/provider/assets/stylesheets/font/font-awesome.css',
            '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
            '/app/assets/stylesheets/app/subdir/foo.css',
            '/app/assets/stylesheets/app/subdir/foo/bar.css.less',
        ));
    }

    public function testStylesheetManifest4()
    {
        $output = $this->parser->stylesheetFiles('manifest4');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/stylesheets/twitter/bootstrap.min.css',
            '/provider/assets/stylesheets/font/font-awesome.css',
            '/app/assets/stylesheets/manifest4.css',
        ));
    }

    /**
     * @expectedException Codesleeve\Sprockets\Exceptions\InvalidPathException
     */
    public function testStylesheetManifest5()
    {
        $output = $this->parser->stylesheetFiles('manifest5');
    }

    public function testStylesheetManifest6()
    {
        $output = $this->parser->stylesheetFiles('manifest6');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/provider/assets/stylesheets/twitter/bootstrap.min.css',
            '/app/assets/stylesheets/manifest6.css',
        ));
    }

    public function testStylesheetAppApplication()
    {
        $output = $this->parser->stylesheetFiles('app/application');
        $output = $this->stripBasePathFromArray($output);
        $this->assertEquals($output, array(
            '/app/assets/stylesheets/app/application.css',
            '/app/assets/stylesheets/app/dashboard.css.less',
            '/app/assets/stylesheets/app/fonts.css',
            '/app/assets/stylesheets/app/home.index.css',
            '/app/assets/stylesheets/app/login.css.less',
            '/app/assets/stylesheets/app/main.css.less',
            '/app/assets/stylesheets/app/subdir/add-blog-modal.css.less',
            '/app/assets/stylesheets/app/subdir/foo.css',
            '/app/assets/stylesheets/app/subdir/foo/bar.css.less',
        ));
    }

    public function testFileLoadingOrderForRequireTree()
    {
        $output1 = $this->parser->javascriptFiles('manifest9');
        $output1 = $this->stripBasePathFromArray($output1);

        $output2 = $this->parser->javascriptFiles('manifest10');
        $output2 = $this->stripBasePathFromArray($output2);

        $this->assertNotEquals($output1, $output2);
        $this->assertEquals(count($output1), count($output2));
    }
}