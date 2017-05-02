<?php

class Num{

    protected $value;

    public function __construct($num){
        $this->value = $num;
    }

    public function getValue(){
        return $this->value;
    }

}
