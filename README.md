# Design Pattern

> A design pattern is a general repeatable solution to a commonly occurring problem in software design. It's not a finished design that can be transformed directly into code. Rather, it is a description or template for how to solve a problem that can be used in many different situations.

Source: "Design Patterns: Elements of Reusable Object-Oriented Software" by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides. This book is considered one of the classic references on design patterns in software engineering.

# About Project

- Write in PHP Object
- Disclaimer : Design Pattern can be implemented in various programming languages besides PHP
- Simple Study Case with implemented Design Pattern

# Singleton

## What is singleton ?

> _A design pattern is a general repeatable solution to a commonly occurring problem in software design. It's not a finished design that can be transformed directly into code. Rather, it is a description or template for how to solve a problem that can be used in many different situations._ .
> **- "Design Patterns: Elements of Reusable Object-Oriented Software"**

## Implementation

Env File **Env\env.php**

> This file serves as the environment variable for the database, with "prod" for production and "test" for testing purposes.

```php
function env(): array
{
    return [
        "database" => [
            "prod" => [
                "host" => "localhost",
                "port" => 3306,
                "dbname" => "singleton",
                "username" => "root",
                "password" => ""
            ],
            "test" => [
                "host" => "localhost",
                "port" => 3306,
                "dbname" => "singleton_test",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}

```

Connection Database **Connection\Database.php**

> The implementation of the Singleton pattern is actually quite simple, as it follows the definition of using one object for multiple actions. This is done by checking if the object has already been created. If the object is still null, meaning it hasn't been created yet, a new object will be created. But if the object has already been created, the previously created object will be returned instead of creating a new one. This ensures that there is only one instance of the class at any given time.

```php
class Database
{
    // Default null
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "test")
    {
        // Checking if object not even created before
        // If it is null then create ones else return created object before
        if (self::$pdo == null) {
            require_once __DIR__ . "/../Env/env.php";
            // Env Array
            $ENV = env();
            $url = "mysql:port=" . $ENV["database"][$env]["host"] . ":" . $ENV["database"][$env]["port"] . ";dbname=" . $ENV["database"][$env]["dbname"];

            // Create Object
            self::$pdo =  new \PDO($url, $ENV["database"][$env]["username"], $ENV["database"][$env]["password"]);
        }
        // Return Object
        return self::$pdo;
    }
}
```

### Built By

Muhammad Rizal Firdaus
