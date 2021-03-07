<?php

require_once "ProductoAbstracto.php";

class ProductoSimple extends ProductoAbstracto
{

    public function __construct($nombre, $precio) {        
        parent::__construct($nombre, $precio);
    }

}

?>