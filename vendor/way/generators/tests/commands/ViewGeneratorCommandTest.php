<?php

use Way\Generators\Commands\ViewGeneratorCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class ViewGeneratorCommandTest extends PHPUnit_Framework_TestCase {

    public function tearDown()
    {
        m::close();
    }

    public function testGeneratesView()
    {
        $gen = m::mock('Way\Generators\Generators\ViewGenerator');
        $gen->shouldReceive('make')
            ->once()
            ->with(app_path() . '/views/hello.blade.php', 'foo')
            ->andReturn(true);

        $command = new ViewGeneratorCommand($gen);

        $tester = new CommandTester($command);
        $tester->execute(['name' => 'hello', '--template' => 'foo']);

        $this->assertEquals("Created " . app_path() . "/views/hello.blade.php\n", $tester->getDisplay());
    }

}
