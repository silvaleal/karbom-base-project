<?php


namespace Karbom\Cli\Db;

use Karbom\Rules;

class Migration
{
    private $args;
    private $rules;
    private $content;


    public function __construct()
    {
        $this->args = $_SERVER['argv'];
        $this->rules = Rules::get();
        $this->content = require __DIR__ . "/../base/migrations.php";
    }

    public function up()
    {
        $argName = $this->args[2];
        $path = $this->rules['paths']['migrations'];
        $name = "$path/{$this->args[2]}.php";

        $this->content = str_replace("%name%",  $this->args[2], $this->content);

        if (!file_exists($name)) {
            if (!file_exists($path)) {
                echo "\nMigrations folder not found.\nCheck your .env and correct it.\n ";
                return;
            }

            $file = fopen($name, 'w');
            fwrite($file, $this->content);

            echo "\n\033[92mMigration created successfully.\n\033[39m\n";
        } else {
            echo "\n\033[92mA model with this name already exists.\n\033[39m\n";
        }
    }
}