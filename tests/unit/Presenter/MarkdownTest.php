<?php
namespace Tests\Unit\Presenter;

use PHPUnit\Framework\TestCase;
use tariqwalji\Loader\Metadata;
use tariqwalji\Presenter\Markdown as MarkdownPresenter;

class MarkdownTest extends TestCase
{
    public function test_generate_output_from_example_fixture(): void
    {
        $metadata = Metadata::load(__DIR__ . "/../../fixtures/example-composer.json");
        $presenter = new MarkdownPresenter();
        $output = $presenter->apply($metadata);

        $this->assertEquals( "example/exampleproject\n"
                                    . "======================\n"
                                    . "This is a description\n"
                                    . "---------------------\n"
                                    . "\n"
                                    . "* example/exampleproject (^9.1)"
                                    . "\n"
                                    . "* example/notherexample (^0.1)"
                                    . "\n"
                                    . "* anotheruser/anotherexample (^5.0)", $output);
    }
}
