<?php

require __DIR__ . '/autoload.php';

class Test extends Thread{
    public function run(){
        ini_set('log_errors', true);
        spl_autoload_register('class_autoload');

        $this->doCount();
    }

    protected function doCount(){
        for($len = 10; $len--;){
            echo Calculator::sum(new Num($len * 2), new Num($len)) . "\n";
            usleep(500000);
        }
    }
}

$thread = new Test();
$thread->start();
$thread->join();
