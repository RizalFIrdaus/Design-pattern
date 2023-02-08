<?php

namespace Rizal\DesignPattern\factorymethod;

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
