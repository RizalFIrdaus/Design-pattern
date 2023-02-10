<?php

namespace Rizal\DesignPattern\facade\Repository;

use PHPUnit\Framework\TestCase;
use Rizal\DesignPattern\facade\Connection\Database;
use Rizal\DesignPattern\facade\Entity\BankAccount;

class AccountRepositoryTest extends TestCase
{
    private AccountRepository $accountRepository;

    public function setUp(): void
    {
        $this->accountRepository = new AccountRepository(Database::getConnection("prod"));
    }

    public function testSave()
    {
        $account1 = new BankAccount();
        $account1->setNoRek("0001");
        $account1->setSaldo(5500000);
        $account2 = new BankAccount();
        $account2->setNoRek("0002");
        $account2->setSaldo(3250000);
        $this->accountRepository->save($account1);
        $this->accountRepository->save($account2);
    }

    public function testGetById()
    {
        $response = $this->accountRepository->getById("0001");
        self::assertEquals("0001", $response->getNoRek());
        $response2 = $this->accountRepository->getById("2223");
        self::assertNull($response2);
    }

    public function testUpdate()
    {
        $account = $this->accountRepository->getById("0001");
        $account->setSaldo(10000000);
        $response = $this->accountRepository->update($account);
        self::assertEquals($account->getSaldo(), $response->getSaldo());
    }
}
