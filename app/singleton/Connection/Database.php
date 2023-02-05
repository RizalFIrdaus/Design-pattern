<?php

namespace Rizal\DesignPattern\singleton\Connection;

use PDO;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "tests")
    {
        if (self::$pdo == null) {
            require_once __DIR__ . "/../Env/env.php";
            $env = env();
            $url = "host:port=" . $env["database"][$env]["host"] . ":" . $env["database"][$env]["port"] . ";dbname=" . $env["database"][$env]["dbname"];
            self::$pdo =  new PDO($url, $env["database"][$env]["username"], $env["database"][$env]["password"]);
        }
        return self::$pdo;
    }
}
