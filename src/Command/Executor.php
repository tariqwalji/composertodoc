<?php
namespace tariqwalji\Command;

use tariqwalji\Loader\Metadata;
use tariqwalji\Presenter\Markdown;

class Executor
{
    private $args;
    private $presenter;

    public function __construct($args)
    {
        $this->args = $args;
        $this->presenter = new Markdown();
    }

    public function run()
    {
        if(count($this->args) < 2) {
            return "composertodoc\n"
                ."Transforms composer.json into markdown\n"
                ."\n"
                ."Usage: composertodoc nameofcomposer.json > OUTPUT.md\n";
        }

        $metadata = Metadata::load($this->args[1]);
        return $this->presenter->apply($metadata);
    }
}
