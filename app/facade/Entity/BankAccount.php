<?php

namespace Rizal\DesignPattern\facade\Entity;


class BankAccount
{
    private string $no_rek;
    private float $saldo;

    /**
     * Get the value of no_rek
     *
     * @return string
     */
    public function getNoRek(): string
    {
        return $this->no_rek;
    }

    /**
     * Set the value of no_rek
     *
     * @param string $no_rek
     *
     * @return self
     */
    public function setNoRek(string $no_rek): self
    {
        $this->no_rek = $no_rek;

        return $this;
    }

    /**
     * Get the value of saldo
     *
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * Set the value of saldo
     *
     * @param float $saldo
     *
     * @return self
     */
    public function setSaldo(float $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }
}
