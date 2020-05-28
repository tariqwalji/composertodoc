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
}
