<?php
namespace Tests\Unit\Loader;

use PHPUnit\Framework\TestCase;
use tariqwalji\Loader\Metadata;

class MetadataTest extends TestCase
{
    private $fixture;

    public function setUp(): void
    {
        parent::setUp();
        $this->fixture = Metadata::load(__DIR__ . '/../../fixtures/example-composer.json');
    }

    public function test_example_fixture_is_valid(): void
    {
        $this->assertIsObject($this->fixture);
    }

    public function test_can_get_project_name(): void
    {
        $this->assertEquals("example/exampleproject", $this->fixture->getProjectName());
    }

    public function test_can_get_project_description(): void
    {
        $this->assertEquals("This is a description", $this->fixture->getProjectDescription());
    }

    public function test_can_get_example_dependencies(): void
    {
        $this->assertIsObject($this->fixture->getDependencies());
    }
}