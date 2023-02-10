<?php

namespace Rizal\DesignPattern\facade\Service;

use PHPUnit\Framework\TestCase;
use Rizal\DesignPattern\facade\Connection\Database;
use Rizal\DesignPattern\facade\Repository\AccountRepository;

class TransferBankServiceTest extends TestCase
{
    private TransferBankService $transferbankService;
    private AccountRepository $accountRepository;
    public function setUp(): void
    {
        $this->accountRepository = new AccountRepository(Database::getConnection("prod"));
        $this->transferbankService = new TransferBankService($this->accountRepository);
    }

    public function testTransferbank()
    {
        $from = $this->accountRepository->getById("0001");
        $to = $this->accountRepository->getById("0002");
        $response = $this->transferbankService->transfer($from, $to, 5000000);
        self::assertTrue($response);
    }
}
