<?php

function env(): array
{
    return [
        "database" => [
            "prod" => [
                "host" => "localhost",
                "port" => 3306,
                "dbname" => "bank_account",
                "username" => "root",
                "password" => ""
            ],
            "test" => [
                "host" => "localhost",
                "port" => 3306,
                "dbname" => "bank_account_test",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
