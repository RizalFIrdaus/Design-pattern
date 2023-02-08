<?php

namespace Rizal\DesignPattern\factorymethod;

use PHPUnit\Framework\TestCase;

class EmployeeFactoryTest extends TestCase
{
    public function testManager()
    {
        $manager1 = EmployeeFactory::createManager("Fahmi Ihsan");
        $manager2 = EmployeeFactory::createManager("Anisa Maulifa");
        self::assertNotNull($manager1);
        self::assertNotNull($manager2);
        self::assertEquals("Hello Fahmi Ihsan, selamat datang diperusahaan kami sebagai Manager, dengan salary 8000000", $manager1->sayWelcome());
        self::assertEquals("Hello Anisa Maulifa, selamat datang diperusahaan kami sebagai Manager, dengan salary 8000000", $manager2->sayWelcome());
    }

    public function testProgrammer()
    {
        $programmer1 = EmployeeFactory::createProgrammer("Rizal");
        $programmer2 = EmployeeFactory::createProgrammer("Firdaus");
        self::assertNotNull($programmer1);
        self::assertNotNull($programmer2);
        self::assertEquals("Hello Rizal, selamat datang diperusahaan kami sebagai Programmer, dengan salary 12000000", $programmer1->sayWelcome());
        self::assertEquals("Hello Firdaus, selamat datang diperusahaan kami sebagai Programmer, dengan salary 12000000", $programmer2->sayWelcome());
    }

    public function testFactoryMethod()
    {
        $manager = EmployeeFactory::createManager("Joko");
        $programmer = EmployeeFactory::createProgrammer("Imron");
        self::assertNotEquals($manager, $programmer);
    }
}
