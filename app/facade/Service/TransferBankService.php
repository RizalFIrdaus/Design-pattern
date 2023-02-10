<?php

namespace Rizal\DesignPattern\facade\Service;

use Rizal\DesignPattern\facade\Entity\BankAccount;
use Rizal\DesignPattern\facade\Repository\AccountRepository;

class TransferBankService
{
    public function __construct(private AccountRepository $accountRepository)
    {
    }
    public function transfer(BankAccount $from, BankAccount $to, $saldo)
    {
        $Tfform = $this->accountRepository->getById($from->getNoRek());
        $Tfto = $this->accountRepository->getById($to->getNoRek());
        $Tfform->getSaldo() - $saldo;
        $Tfto->getSaldo() + $saldo;
        $this->accountRepository->save($Tfform);
        $this->accountRepository->save($Tfto);
    }
}
