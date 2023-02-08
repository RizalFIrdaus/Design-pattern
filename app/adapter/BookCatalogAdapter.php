<?php

namespace Rizal\DesignPattern\adapter;


class BookCatalogAdapter implements InterfaceAdapter
{
    public function __construct(private Book $book)
    {
    }
    public function getCatalogTitle()
    {
        return $this->book->getTitle() . " Covered by " . $this->book->getPages() . " Pages";
    }
}
