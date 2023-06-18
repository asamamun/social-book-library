<?php
require __DIR__ . '/vendor/autoload.php';
$db = new MysqliDb();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name'=>"test",
        'email'=>"test@gmail.com",
        'password'=>password_hash("secret",PASSWORD_DEFAULT),
        'role'=>'1',
        'active'=>1,
    ];
    echo $db->insert("users",$data);
}

