<?php

namespace Rizal\DesignPattern\facade\Connection;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "test")
    {
        if (self::$pdo == null) {
            require_once __DIR__ . "/../env.php";
            $ENV = env();
            $url = "mysql:port=" . $ENV["database"][$env]["host"] . ":" . $ENV["database"][$env]["port"] . ";dbname=" . $ENV["database"][$env]["dbname"];
            self::$pdo =  new \PDO($url, $ENV["database"][$env]["username"], $ENV["database"][$env]["password"]);
        }
        return self::$pdo;
    }
}
