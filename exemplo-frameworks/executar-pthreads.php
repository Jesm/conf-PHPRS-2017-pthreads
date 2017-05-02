<?php

function log_duration($closure){
  $start = microtime(true);
  $str = $closure();
  $duration = round((microtime(true) - $start) * 1000);
  echo "\n[$duration ms] $str";
}

function page_title($url){
  $html = file_get_contents($url);
  preg_match('/<title>(.+)<\/title>/is', $html, $matches);
  return trim($matches[1]);
}

class Requester extends Thread{
  protected $url;

  public function __construct($url){
    $this->url = $url;
  }

  public function run(){
    $url = $this->url;
    log_duration(function() use ($url){
      return page_title($url);
    });
  }
}

log_duration(function(){
  $arr = [
    'https://cakephp.org', 'http://www.codeigniter.com',
    'https://laravel.com', 'https://symfony.com'
  ];

  $threads = [];
  foreach($arr as $url)
    $threads[] = new Requester($url);

  foreach($threads as $thread)
    $thread->start();

  foreach($threads as $thread)
    $thread->join();

  return "DURAÇÃO TOTAL\n";
});
