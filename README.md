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

### Env

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

**The implementation of the Singleton pattern is actually quite simple, as it follows the definition of using one object for multiple actions. This is done by checking if the object has already been created. If the object is still null, meaning it hasn't been created yet, a new object will be created. But if the object has already been created, the previously created object will be returned instead of creating a new one. This ensures that there is only one instance of the class at any given time.**

### Database Class

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

### House Class

To start creating the Builder Pattern in this case study, first, we need to create an abstract class for the house.

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

### HouseBuilderInterface

Create the HouseBuilder interface first, it contains the build function which must be overridden as a builder in the HouseBuilder class later

```php
interface HouseBuilderInterface
{
    public function build(): House;
}
```

### House Builder Class

Then, create the HouseBuilder class which is an implementation of the HouseBuilderInterface, then create the constructor for all the properties and create the build function which is the creation of an object. To handle the null variable, we can set the default value in the property in the HouseBuilder class.

```php
class HouseBuilder implements HouseBuilderInterface
{
    private int $windows = 0;
    private int $doors = 0;
    private int $rooms = 0;
    private bool $gerage = false;
    private bool $swimmingPool = false;
    private bool $statues = false;
    private bool $garden = false;

    public function setWindows(int $windows)
    {
        $this->windows = $windows;
        return $this;
    }

    public function setDoors(int $doors)
    {
        $this->doors = $doors;
        return $this;
    }

    public function setRooms(int $rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    public function setGerage(bool $gerage)
    {
        $this->gerage = $gerage;
        return $this;
    }
    public function setSwimingPool(bool $swimmingPool)
    {
        $this->swimmingPool = $swimmingPool;
        return $this;
    }

    public function setStatues(bool $statues)
    {
        $this->statues = $statues;
        return $this;
    }

    public function setGarden(bool $garden)
    {
        $this->garden = $garden;
        return $this;
    }

    public function build(): House
    {
        return new House(
            $this->windows,
            $this->doors,
            $this->rooms,
            $this->gerage,
            $this->swimmingPool,
            $this->statues,
            $this->garden
        );
    }
}
```

## Testing

In this testing process, a check will be made to see if houses built with different combinations without setting unnecessary properties will result in non-null variables.

```php
 public function testHouseBuild()
    {
        $house1 = (new HouseBuilder())
            ->setWindows(2)
            ->setGerage(true)
            ->setRooms(2)
            ->setDoors(1)
            ->build();
        $house2 = (new HouseBuilder())
            ->setDoors(2)
            ->setWindows(4)
            ->setRooms(1)
            ->build();
        $house3 = (new HouseBuilder())
            ->setDoors(1)
            ->build();
        $house4 = (new HouseBuilder())->build();
        self::assertNotNull($house1);
        self::assertNotNull($house2);
        self::assertNotNull($house3);
        self::assertNotNull($house4);
    }
```

The Result

```shell
PHPUnit 10.0.3 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.0

.                                                                   1 / 1 (100%)

Time: 00:00.386, Memory: 6.00 MB

OK (1 test, 4 assertions)
```

## More information about Builder

https://refactoring.guru/design-patterns/builder

# Factory Method

## What is Factory Method Pattern ?

> Factory Method is a creational design pattern that provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created. It's a way to delegate the instantiation logic to child classes.

- Design Patterns: Elements of Reusable Object-Oriented Software by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides

## Implementation

When creating an employee object that has the properties of name, position, and salary, the employee object will create a manager with the name x with the position of manager and a salary of 10. Then we want to create a new manager with the name y with the same position, which is manager, and a salary of 10. In another scenario, we want to create a Staff with the name V with the position of staff and a salary of 8. What is wrong in this situation? Nothing seems to be wrong, but we are writing the program poorly. So, how do we solve this issue? We can use the factory method design pattern, which separates the creation of the staff and manager positions when creating the employee object.

### Employee Class

```php
class Employee
{
    public function __construct(
        private string $name,
        private string $title,
        private string $salary
    ) {
    }

    public function sayWelcome(): string
    {
        return "Hello $this->name, selamat datang diperusahaan kami sebagai $this->title, dengan salary $this->salary";
    }
}
```

### Employee Factory

```php
class EmployeeFactory
{
    public static function createManager(string $name): Employee
    {
        return new Employee($name, "Manager", 8000000);
    }

    public static function createProgrammer(string $name): Employee
    {
        return new Employee($name, "Programmer", 12000000);
    }
}
```

## Testing

Testing will be performed in three stages, checking if the output of the sayWelcome function is equal or not.

### Test Manager

```php
 public function testManager()
    {
        $manager1 = EmployeeFactory::createManager("Fahmi Ihsan");
        $manager2 = EmployeeFactory::createManager("Anisa Maulifa");
        self::assertNotNull($manager1);
        self::assertNotNull($manager2);
        self::assertEquals("Hello Fahmi Ihsan, selamat datang diperusahaan kami sebagai Manager, dengan salary 8000000", $manager1->sayWelcome());
        self::assertEquals("Hello Anisa Maulifa, selamat datang diperusahaan kami sebagai Manager, dengan salary 8000000", $manager2->sayWelcome());
    }
```

### Test Programmer

```php
 public function testProgrammer()
    {
        $programmer1 = EmployeeFactory::createProgrammer("Rizal");
        $programmer2 = EmployeeFactory::createProgrammer("Firdaus");
        self::assertNotNull($programmer1);
        self::assertNotNull($programmer2);
        self::assertEquals("Hello Rizal, selamat datang diperusahaan kami sebagai Programmer, dengan salary 12000000", $programmer1->sayWelcome());
        self::assertEquals("Hello Firdaus, selamat datang diperusahaan kami sebagai Programmer, dengan salary 12000000", $programmer2->sayWelcome());
    }
```

### Test FactoryMethod

```php
  public function testFactoryMethod()
    {
        $manager = EmployeeFactory::createManager("Joko");
        $programmer = EmployeeFactory::createProgrammer("Imron");
        self::assertNotEquals($manager, $programmer);
    }
```

## More information about Factory Method

https://refactoring.guru/design-patterns/factory-method

# Abstract Factory

https://refactoring.guru/design-patterns/abstract-factory

### Built By

Muhammad Rizal Firdaus
