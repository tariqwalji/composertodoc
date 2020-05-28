<?php
namespace tariqwalji\Value;

class Metadata
{
    private $projectName;
    private $projectDescription;
    private $dependencies;

    public function __construct(string $projectName, string $projectDescription, object $dependencies)
    {
        $this->projectName = $projectName;
        $this->projectDescription = $projectDescription;
        $this->dependencies = $dependencies;
    }

    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function getProjectDescription(): string
    {
        return $this->projectDescription;
    }

    public function getDependencies(): object
    {
        return $this->dependencies;
    }

    public function getDependenciesAsArray(): array
    {
        return get_object_vars($this->dependencies);
    }
}