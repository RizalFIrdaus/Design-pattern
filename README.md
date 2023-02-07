# Design Pattern

> A design pattern is a general repeatable solution to a commonly occurring problem in software design. It's not a finished design that can be transformed directly into code. Rather, it is a description or template for how to solve a problem that can be used in many different situations.

Source: "Design Patterns: Elements of Reusable Object-Oriented Software" by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides. This book is considered one of the classic references on design patterns in software engineering.

# About Project

- Write in PHP Object
- Disclaimer : Design Pattern can be implemented in various programming languages besides PHP
- Simple Study Case with implemented Design Pattern

# Singleton

## What is singleton ?

> _Singleton is a creational design pattern that lets you ensure that a class has only one instance, while providing a global access point to this instance._ .

## Implementation

Env File **Env\env.php**

**This file serves as the environment variable for the database, with "prod" for production and "test" for testing purposes.**

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

## Testing

> This test will test the singleton pattern, if successful, creating objects repeatedly will return the same object. This is because the singleton pattern has been applied.

```php
public function testSingleton()
    {
        $connection1 = Database::getConnection();
        $connection2 = Database::getConnection();
        $connection3 = Database::getConnection();
        self::assertSame($connection1, $connection2);
        self::assertSame($connection3, $connection2);
        self::assertSame($connection1, $connection3);
    }
```

Result :

```shell
PHPUnit 10.0.3 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.0

.                                                                   1 / 1 (100%)

Time: 00:00.367, Memory: 6.00 MB

OK (1 test, 4 assertions)
```

## More Information about singleton pattern

> Refactoring Guru
> https://refactoring.guru/design-patterns/singleton

# Builder

## What is Builder ?

> Builder Pattern is a creational design pattern that lets you construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code. The Builder pattern provides a way to create objects that are expected to have a complex structure.

Source : "Design Patterns: Elements of Reusable Object-Oriented Software" by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides."

## Implementation

**In this scenario, Builder pattern can help solve the problem. We can create a builder class for each type of house we want to build (e.g. MansionBuilder, HotelBuilder, etc.), each builder class will have methods to specify each part of the house. In the case of Mansion, we don't need to set the garage to null because the MansionBuilder does not have a method to add a garage. The main house class will call the methods of the selected builder to build the house. This will make the code more structured and easier to read. By creating a new object that is the builder of the house object, whatever we set will not affect the constructor. This way, we can build the pool only without setting the garage to null.**

builder/house.php

```php
class House
{
    public function __construct(
        private int $windows,
        private int $doors,
        private int $rooms,
        private bool $gerage,
        private bool $swimmingPool,
        private bool $statues,
        private bool $garden,
    ) {
    }
}

```

### Built By

Muhammad Rizal Firdaus
