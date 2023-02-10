<?php

namespace Rizal\DesignPattern\facade\Service;

use Rizal\DesignPattern\facade\Entity\BankAccount;
use Rizal\DesignPattern\facade\Repository\AccountRepository;

class TransferBankService
{
    public function __construct(private AccountRepository $accountRepository)
    {
    }
    public function transfer(BankAccount $from, BankAccount $to, $saldo): bool
    {
        if ($from->getSaldo() < $saldo) {
            return false;
        }
        $Tfform = $this->accountRepository->getById($from->getNoRek());
        $Tfto = $this->accountRepository->getById($to->getNoRek());
        $transfer = $Tfform->setSaldo($Tfform->getSaldo() - $saldo);
        $transfer2 = $Tfto->setSaldo($Tfto->getSaldo() + $saldo);
        $this->accountRepository->update($transfer);
        $this->accountRepository->update($transfer2);
        return true;
    }
}
