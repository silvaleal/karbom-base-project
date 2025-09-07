<?php

## Nota do desenvolvedor
#
# As regras são importantes para a ferramenta funcionar, é aqui que você irá configurar seu banco de dados e as pastas do meu projeto

namespace Karbom;

class Rules
{
    private static $rules = [];

    public static function build()
    {
        self::$rules["mysql"] = [
            "dbHost" => $_ENV['DATABASE_HOST'] ?? 'localhost',
            "dbUser" => $_ENV['DATABASE_USER'] ?? 'root',
            "dbPassword" => $_ENV['DATABASE_PASSWORD'] ?? '',
            "dbName" => $_ENV['DATABASE_NAME'] ?? 'karbom'
        ];

        self::$rules["paths"] = [
            "migrations" => getcwd() . $_ENV['KARBOM_MIGRATIONS']
        ];
    }

    public static function get()
    {
        self::build();
        return self::$rules;
    }
}