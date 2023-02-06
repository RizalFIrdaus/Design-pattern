<?php

namespace Rizal\DesignPattern\builder;


class HouseBuilder
{
    private int $windows = 0;
    private int $doors = 0;
    private int $rooms = 0;
    private bool $gerage = false;
    private bool $swimmingPool = false;
    private bool $statues = false;
    private bool $garden = false;

    public function setWindows(int $windows)
    {
        $this->windows = $windows;
        return $this;
    }

    public function setDoors(int $doors)
    {
        $this->doors = $doors;
        return $this;
    }

    public function setRooms(int $rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    public function setGerage(bool $gerage)
    {
        $this->gerage = $gerage;
        return $this;
    }
    public function setSwimingPool(bool $swimmingPool)
    {
        $this->swimmingPool = $swimmingPool;
        return $this;
    }

    public function setStatues(bool $statues)
    {
        $this->statues = $statues;
        return $this;
    }

    public function setGarden(bool $garden)
    {
        $this->garden = $garden;
        return $this;
    }

    public function build(): House
    {
        return new House(
            $this->windows,
            $this->doors,
            $this->rooms,
            $this->gerage,
            $this->swimmingPool,
            $this->statues,
            $this->garden
        );
    }
}
