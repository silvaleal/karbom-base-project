# Karbom

[Packagist](https://packagist.org/packages/silvaleal/karbom) | [Wiki (pt\_BR)](https://github.com/silvaleal/karbom/wiki/Portuguese) | [Wiki (EN)](https://github.com/silvaleal/karbom/wiki/English) | [Base Project (Example)](https://github.com/silvaleal/karbom-base-project)

A PHP library designed to help developers who want to use **PDO** in their applications.
**Note**: this project is **not an ORM**, but simply a shortcut for creating tables using plain PDO.

## How to use?

```shell
php .\vendor\bin\karbom                      # Lists all commands
php .\vendor\bin\karbom <category>           # Lists commands from a specific category
php .\vendor\bin\karbom db:migration <name>  # Creates a migration
php .\vendor\bin\karbom db:seeder            # Creates a seeder
php .\vendor\bin\karbom db:load              # Sets up your database
php .\vendor\bin\karbom db:seed              # Carregue seus seeders
```

## Installation

```shell
# Step 1: install in your project
composer require silvaleal/karbom

# Step 2: configure your .env file

DATABASE_HOST="localhost"
DATABASE_USER="root"
DATABASE_PASSWORD=""
DATABASE_NAME="karbomTest"

KARBOM_MIGRATIONS="/sql/Migrations/"  # Important: must start and end with "/"
KARBOM_SEEDERS="/sql/Seeders/"        # Important: must start and end with "/"
```

## Dependencies

* PHP 8.2+
* vlucas/phpdotenv
