<?php

namespace Rizal\DesignPattern\adapter;


class ScreencaseCatalogAdapter implements InterfaceAdapter
{
    public function __construct(private Screencase $screencase)
    {
    }
    public function getCatalogTitle()
    {
        return $this->screencase->getTitle() . " Set Duration by " . $this->screencase->getDuration() . " Hours";
    }
}
