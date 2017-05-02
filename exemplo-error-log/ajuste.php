<?php

function simulate_error($arr){
    return 10 / $divider->getValue();
}

class Example extends Thread{
    public function run(){
        ini_set('log_errors', true);
        simulate_error();
    }
}

$thread = new Example();
$thread->start();
$thread->join();
