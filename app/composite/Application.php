<?php


namespace Rizal\DesignPattern\composite;

require_once __DIR__ . "/../../vendor/autoload.php";


$listCategories = [
  new CompositeCategory("Mobile",array(
          new Category("Android"),
          new Category("IOS")
  )
  ),
  new CompositeCategory("Makanan", array(
      new CompositeCategory("Makanan Cepat Saji", array(
          new CompositeCategory("Mie Instan", array(
              new Category("Indomie Goreng"),
              new Category("Indomie Kuah")
          )),
          new Category("Bubur Instan"),
          new Category("Rendang Instan")
      )),
  )),
  new CompositeCategory("Minuman", array(
      new Category("Teh Botol")
  )),
  new CompositeCategory("PC", array(
      new Category("AMD"),
      new Category("INTEL")
  )),
    new Category("Fashion"),
    new Category("Obat")
];

foreach ($listCategories as $listCategory){
    echo $listCategory->getName().PHP_EOL;
    if($listCategory instanceof CompositeCategory){
        foreach ($listCategory->getListCategory() as $category){
            echo $category->getName().PHP_EOL;
        }
    }
}