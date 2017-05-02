<?php

class Incrementer extends Thread{
    protected $threaded, $increment;
    public function __construct($threaded, $increment){
        $this->threaded = $threaded;
        $this->increment = $increment;
    }
    public function run(){
        for($len = 100000; $len--;)
            $this->threaded->add($this->increment);
    }
}

class Number extends Threaded{
    protected $value = 0;
    public function add($num){
        $this->synchronized(function(){
            $this->value += $num;
        });
    }
    public function getValue(){
        return $this->value;
    }
}

$number = new Number();

$incrementer1 = new Incrementer($number, 1);
$incrementer2 = new Incrementer($number, -1);

$incrementer1->start();
$incrementer2->start();

$incrementer1->join();
$incrementer2->join();

echo "\nValor final: " . $number->getValue() . "\n\n";
