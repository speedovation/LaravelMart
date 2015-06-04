<?php namespace Codesleeve\Sprockets;

class BaseDirectiveTest extends TestCase
{
    public function setUp()
    {
        $this->directive = new Directives\BaseDirective;
    }

    /**
     * Just make sure it doesn't throw some error
     *
     * @expectedException Codesleeve\Sprockets\Exceptions\UnknownSprocketsDirectiveException
     * @return void
     */
    public function testProcess()
    {
        $output = $this->directive->process('.');
    }

}