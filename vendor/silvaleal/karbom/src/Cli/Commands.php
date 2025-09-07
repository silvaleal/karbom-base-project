<?php

namespace Karbom\Cli;

class Commands
{
    public static function list()
    {
        return [
            "db" => [
                "db:load" => "Configure your database with a command.",
                "db:migration <name>" => "Create a migration."
            ]
        ];
    }
}