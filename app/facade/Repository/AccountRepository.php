<?php

namespace Rizal\DesignPattern\facade\Repository;

use Rizal\DesignPattern\facade\Entity\BankAccount;

class AccountRepository
{
    public function __construct(private \PDO $connection)
    {
    }
    public function save(BankAccount $bankAccount): BankAccount
    {
        $statement = $this->connection->prepare("INSERT INTO accounts (no_rek,saldo) VALUE (?,?)");
        $statement->execute([$bankAccount->getNoRek(), $bankAccount->getSaldo()]);
        return $bankAccount;
    }
    public function getById(string $id): ?BankAccount
    {
        $statement = $this->connection->prepare("SELECT * FROM accounts WHERE no_rek=?");
        $statement->execute([$id]);
        if ($row = $statement->fetch()) {
            $account = new BankAccount();
            $account->setNoRek($row["no_rek"]);
            $account->setSaldo($row["saldo"]);
            return $account;
        } else {
            return null;
        }
    }
}
