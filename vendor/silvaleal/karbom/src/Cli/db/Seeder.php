<?php

namespace Karbom\Cli\Db;

use Karbom\Rules;

class Seeder
{
    private $args;
    private $rules;
    private $content;

    public function __construct()
    {
        $this->args = $_SERVER['argv'];
        $this->rules = Rules::get();
        $this->content = require __DIR__ . "/../base/seeder.php";
    }

    public function up()
    {
        $path = $this->rules['paths']['seeders'];
        $name = "$path/{$this->args[2]}.php";

        $this->content = str_replace("%name%",  $this->args[2], $this->content);

        if (!file_exists($name)) {
            if (!file_exists($path)) {
                echo "\nSeeders folder not found.\nCheck your .env and correct it.\n ";
                return;
            }

            $file = fopen($name, 'w');
            fwrite($file, $this->content);

            echo "\n\033[92mSeeder created successfully.\n\033[39m\n";
        } else {
            echo "\n\033[92mA seeder with this name already exists.\n\033[39m\n";
        }
    }

}