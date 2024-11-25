<?php 

// Given two numbers, write a program that calculates their modulo and checks if the remainder is even or odd.

$num = 55;
$num2 = 29;

$moduloo = $num % $num2;

if($moduloo %2==0){
    echo "it is even : ". $moduloo;

}else{
    echo "it's odd : ". $moduloo;
}


?>