<?php

namespace Rizal\DesignPattern\composite;

class CompositeCategory extends Category
{
    private array $listCategory;
    public function __construct(string $name, array $listCategory)
    {
        $this->name = $name;
        $this->listCategory= $listCategory;
    }

    /**
     * @return array
     */
    public function getListCategory(): array
    {
        return $this->listCategory;
    }

    /**
     * @param array $listCategory
     */
    public function setListCategory(array $listCategory): void
    {
        $this->listCategory = $listCategory;
    }




}