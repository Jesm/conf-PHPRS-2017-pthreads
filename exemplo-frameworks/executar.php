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

log_duration(function(){
  $arr = ['https://cakephp.org', 'http://www.codeigniter.com', 'https://laravel.com', 'https://symfony.com'];

  foreach($arr as $url){
    log_duration(function() use ($url){
      return page_title($url);
    });
  }

  return "DURAÇÃO TOTAL\n";
});
