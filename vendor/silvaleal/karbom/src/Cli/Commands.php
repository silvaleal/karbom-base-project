<?php

namespace Karbom\Cli;

class Commands
{
    public static function list()
    {
        return [
            "db" => [
                "db:load" => "Configure your database with a command.",
                "db:migration <name>" => "Create a migration.",
                "db:seeder <name>" => "Create a seeder.",
                "db:seed" => "Load your seeders"
            ]
        ];
    }
}