<?php

class Car{

  public  $model;
  public $year ;

    public function __construct($model , $year){
        $this->model = $model;
        $this->year=$year; 
    }
    function message(){
        return "the message is ". $this->model."".$this->year."!";
    }
}

$myCar = new Car("model",1990);
var_dump($myCar);
?>