<?php

namespace Karbom\Cli\Db;

use Karbom\Database;
use Karbom\Rules;

class Load
{
    private $rules;

    public function __construct()
    {
        $rules = Rules::get();
        $this->rules = $rules['mysql'];
    }

    public function up()
    {
        echo "\n\033[92mLoading...\033[39m\n";

        $pdo = new Database();
        $pdo = $pdo->connect();

        $migrations = scandir(getcwd() . $_ENV['KARBOM_MIGRATIONS']);

        foreach ($migrations as $file) {
            if (str_contains($file, ".php")) {
                echo "\033[90mTable: $file\n\033[39m";
                $fileContent = require getcwd() . $_ENV['KARBOM_MIGRATIONS'] . $file;

                foreach ($fileContent as $content) {
                    $stmt = $pdo->prepare($content);
                    $stmt->execute();
                }
            }
        }

        echo "\n\033[92mDatabase configured\033[39m\n";
    }
}

// $config = new Config();
// $config->up();