<?php
class abc{
    function simple(){
        echo"simple function <br>";
    }
    function __construct(){
        echo"Magic function run automatically<br>";
    }
    function display(){
        $this->simple();
        //abc::__construct();
    }
}
$obj=new abc;
$obj->display();


?>