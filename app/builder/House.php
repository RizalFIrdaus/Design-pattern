<?php

namespace Rizal\DesignPattern\builder;


class House
{
    public function __construct(
        private int $windows,
        private int $doors,
        private int $rooms,
        private bool $gerage,
        private bool $swimmingPool,
        private bool $statues,
        private bool $garden,
    ) {
    }
}
