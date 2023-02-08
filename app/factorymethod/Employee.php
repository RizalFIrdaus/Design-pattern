<?php

namespace Rizal\DesignPattern\factorymethod;

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
