<?php
namespace tariqwalji\Presenter;

use tariqwalji\Value\Metadata as MetadataValue;
use tariqwalji\Formatter\Markdown as MarkdownFormatter;

class Markdown
{
    public function apply(MetadataValue $value): string
    {
        $dependencies = $value->getDependenciesAsArray();
        array_walk($dependencies, function(&$value, $key) {
            $value = "$key ($value)";
        });

        return MarkdownFormatter::h1($value->getProjectName())
            . PHP_EOL
            . MarkdownFormatter::h2($value->getProjectDescription())
            . PHP_EOL
            . PHP_EOL
            . MarkdownFormatter::list($dependencies);
    }
}