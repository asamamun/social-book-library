<?php
if (!function_exists('settings')) {
    function settings()
    {
       $root = "http://localhost/R55/PWAD-PHP-R55/git-projects/social-book-library/"; 
        return [
            'root'  => $root,
            'companyname'=> 'Gold Digger Enterprise',
            'logo'=>$root."assets/images/logo.png",
            'homepage'=> $root,
            'adminpage'=>$root.'admin-panel/',
            'hostname'=> 'localhost',
            'user'=> 'root',
            'password'=> '',
            'database'=> 'lioncommerce'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}
if (!function_exists('config')) {
    function config($param)
    {        
      $parts = explode(".",$param);
      $inc = include(__DIR__."/../config/".$parts[0].".php");
      return $inc[$parts[1]];
    }
}
if (!function_exists('dd')) {
    function dd($v)
    {        
        echo "<pre>";
        var_dump($v);
        echo "<pre>";
    }
}
