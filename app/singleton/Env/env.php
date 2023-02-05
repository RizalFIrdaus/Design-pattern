<?php

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
            "tests" => [
                "host" => "localhost",
                "port" => 3306,
                "dbname" => "singleton_test",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
