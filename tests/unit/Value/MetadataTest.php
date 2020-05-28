<?php
namespace Tests\Unit\Value;

use PHPUnit\Framework\TestCase;
use tariqwalji\Value\Metadata;

class MetadataTest extends TestCase
{
    public function test_metadata_stores_value(): void
    {
        $testDependencies = new \stdClass();
        $testDependencies->hello = "world";

        $metadata = new Metadata("projectName", "projectDescription", $testDependencies);
        $this->assertEquals("projectName", $metadata->getProjectName());
        $this->assertEquals("projectDescription", $metadata->getProjectDescription());
        $this->assertEquals($testDependencies, $metadata->getDependencies());
    }

    public function test_metadata_get_dependencies_as_array(): void
    {
        $testDependencies = new \stdClass();
        $testDependencies->firstDependency = "1.0";
        $testDependencies->secondDependency = "0.2";
        $testDependencies->thirdDependency = "5.0";

        $metadata = new Metadata("projectName", "projectDescription", $testDependencies);

        $this->assertEquals([
            "firstDependency" => "1.0",
            "secondDependency" => "0.2",
            "thirdDependency" => "5.0"
        ], $metadata->getDependenciesAsArray());
    }
}
