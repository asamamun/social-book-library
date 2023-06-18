<?php
require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb();
$division = $db->where('divid',"4",">")->get('division');
dd($division);