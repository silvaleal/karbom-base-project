<?php

namespace Karbom\Cli\Db;

use Karbom\Database;
use Karbom\Rules;

class Seed
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

        $seeders = scandir(getcwd() . $_ENV['KARBOM_SEEDERS']);

        foreach ($seeders as $file) {
            if (str_contains($file, ".php")) {
                echo "\033[90mSeeder: $file\n\033[39m";
                $fileContent = require getcwd() . $_ENV['KARBOM_SEEDERS'] . $file;

                foreach ($fileContent as $content) {
                    $stmt = $pdo->prepare($content);
                    $stmt->execute();
                }
            }
        }

        echo "\n\033[92mDatabase configured\033[39m\n";
    }
}