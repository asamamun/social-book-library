<?php
require __DIR__ . '/vendor/autoload.php';
use App\A;
use App\B;
use App\models\productModel;




$obj = new A();
$obj->testA();
$obj2 = new A();
$object = new B();
$object->testB();
$p = new productModel();
$p->testmethod();


?>
<img src="<?= settings()['logo'] ?>" alt="">
<h1><?= settings()['root'] ?></h1>
<h1><?= config("idb.root"); ?></h1>
<h1><?= config("round55.a"); ?></h1>