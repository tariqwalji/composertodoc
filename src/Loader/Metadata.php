<?php
namespace tariqwalji\Loader;

use tariqwalji\Value\Metadata as MetadataValue;

class Metadata
{
    public static function load(string $path): MetadataValue
    {
        $decodedJson = json_decode(file_get_contents($path));
        return new MetadataValue($decodedJson->name, $decodedJson->description, $decodedJson->require);
    }
}