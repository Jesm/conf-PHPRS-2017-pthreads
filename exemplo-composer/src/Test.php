<?php

namespace ThreadExample;

use Thread;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Test extends Thread{
    protected $path, $str;

    public function __construct($path, $str){
        $this->path = $path;
        $this->str = $str;
    }

    public function start(int $options = PTHREADS_INHERIT_ALL) {
        return parent::start(PTHREADS_INHERIT_NONE);
    }

    public function run(){
        ini_set('log_errors', true);

        // var_dump(get_included_files());
        require __DIR__ . '/../vendor/autoload.php';

        $log = new Logger('name');
        $log->pushHandler(new StreamHandler($this->path, Logger::WARNING));
        $log->addWarning($this->str);
    }
}
