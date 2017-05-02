<?php

class Person{
    protected $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function setName($str){
        $this->name = $str;
    }
    public function sayName($append = ''){
        echo $append . "Meu nome é " . $this->name . "\n";
    }
}

class PersonHandler extends Thread{
    protected $person;
    public function __construct($person){
        $this->person = $person;
    }
    public function run(){
        $this->person->sayName("\n[Contexto thread] ");
    }
}

$person = new Person('João');
$handler = new PersonHandler($person);
$person->setName('Chico');
$handler->start();
$handler->join();
$person->sayName("\n[Contexto principal] ");
