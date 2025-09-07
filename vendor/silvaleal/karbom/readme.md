# Karbom

A PHP code designed to help developers who want to use PDO in their applications.
Note: this project is not an ORM, but just a shortcut to work with a database using raw SQL in our project.

## How to use?
```shell
php .\bin\karbom                      # List all commands
php .\bin\karbom <category>           # List commands from a specific category
php .\bin\karbom db:migration <name>  # Create a migration
php .\bin\karbom db:load              # Configure your database
```

## Why did I create this project?

Before using the terminal to configure my database (a method used in Laravel and CodeIgniter4), I used to create a Loader class to handle it. With that approach, every time the site was visited or refreshed (F5), my database would be called—which I do not recommend.

## Installation
```shell
# Step 1: configure your .env
composer require silvaleal/karbom

# Step 2: configure your .env

# Karbom usage standard
DATABASE_HOST="localhost"
DATABASE_USER="root"
DATABASE_PASSWORD=""
DATABASE_NAME="karbomTest"

KARBOM_MIGRATIONS="/sql/Migrations/"  # Important: must start and end with "/"
```