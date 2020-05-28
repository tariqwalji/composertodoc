<?php
namespace Tests\Unit\Markdown;

use PHPUnit\Framework\TestCase;
use tariqwalji\Formatter\Markdown;

class MarkdownTest extends TestCase
{
    public function test_can_format_h1(): void
    {
        $this->assertEquals("Hello World\n===========", Markdown::h1("Hello World"));
    }

    public function test_can_format_h2(): void
    {
        $this->assertEquals("Hello World\n-----------", Markdown::h2("Hello World"));
    }

    public function test_can_format_list(): void
    {
        $this->assertEquals("* requirement 1\n* requirement 2\n* requirement 3",
            Markdown::list(['requirement 1', 'requirement 2', 'requirement 3']));
    }

    public function test_format_list_will_not_alter_original_list(): void
    {
        $list = ['requirement 1', 'requirement 2', 'requirement 3'];
        Markdown::list($list);
        $this->assertEquals(['requirement 1', 'requirement 2', 'requirement 3'], $list);
    }
}
