<?php
namespace Tests\Unit\Command;

use PHPUnit\Framework\TestCase;
use tariqwalji\Command\Executor;

class ExecutorTest extends TestCase
{
    public function test_no_parameters_returns_help()
    {
        $executor = new Executor(['shellcommand']);
        $response = $executor->run();

        $this->assertEquals("composertodoc\n"
                                    ."Transforms composer.json into markdown\n"
                                    ."\n"
                                    ."Usage: composertodoc nameofcomposer.json > OUTPUT.md"
                                    ."\n",
                            $response
        );
    }

    public function test_with_params_returns_markdown()
    {
        $executor = new Executor(['shellcommand', __DIR__ . "/../../fixtures/example-composer.json"]);
        $response = $executor->run();
        $this->assertStringContainsString("example/exampleproject\n======================", $response);
    }
}