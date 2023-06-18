<?php

use App\A;
use App\B;
use App\models\productModel;

require __DIR__ . '/vendor/autoload.php';


$obj = new A();
$obj->testA();
$obj2 = new A();
$object = new B();
$object->testB();
$p = new productModel();
$p->testmethod();


?>