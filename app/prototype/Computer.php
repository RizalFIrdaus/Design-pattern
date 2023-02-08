<?php

namespace Rizal\DesignPattern\prototype;


class Computer
{
    public function __construct(
        private string $monitor,
        private string $processor,
        private string $vga,
        private int $ram,
        private string $storage
    ) {
    }

    /**
     * Set the value of monitor
     *
     * @return  self
     */
    public function setMonitor($monitor)
    {
        $this->monitor = $monitor;

        return $this;
    }


    /**
     * Set the value of processor
     */
    public function setProcessor($processor): self
    {
        $this->processor = $processor;

        return $this;
    }


    /**
     * Set the value of vga
     */
    public function setVga($vga): self
    {
        $this->vga = $vga;

        return $this;
    }


    /**
     * Set the value of ram
     */
    public function setRam($ram): self
    {
        $this->ram = $ram;

        return $this;
    }


    /**
     * Set the value of storage
     */
    public function setStorage($storage): self
    {
        $this->storage = $storage;

        return $this;
    }

    public function clone(): Computer
    {
        return clone $this;
    }

    /**
     * Get the value of monitor
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * Get the value of processor
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * Get the value of vga
     */
    public function getVga()
    {
        return $this->vga;
    }

    /**
     * Get the value of ram
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Get the value of storage
     */
    public function getStorage()
    {
        return $this->storage;
    }
}
