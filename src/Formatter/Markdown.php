<?php
namespace tariqwalji\Formatter;

class Markdown
{
    const H1 = "=";
    const H2 = "-";

    private static function formatHeader(string $text, string $character): string
    {
        return "$text\n" . str_repeat($character, strlen($text));
    }

    public static function h1(string $text): string
    {
        return self::formatHeader($text, self::H1);
    }

    public static function h2(string $text): string
    {
        return self::formatHeader($text, self::H2);
    }

    public static function list(array $list): string
    {
        array_walk($list, static function(&$value) {
            $value = "* $value";
        });

        return implode("\n", $list);
    }
}