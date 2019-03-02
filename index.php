<?php

class Index {

  public $redis;

  public function __construct() {
    $this->redis = new Redis();
    $this->redis->connect('127.0.0.1', 6379);

    echo $this->redis->ping();
    echo '</br>Hello hacker</br>';

  }

  public function redisTest() {

    $push = $_GET['push'] ? $_GET['push'] : false;
    $pop = $_GET['pop'] ? $_GET['pop'] : false;


    if ($push) {
      echo 'Run push: '.$push;
      $this->redis->rPush('char', $push);
    } else if (!$pop) {
      echo 'Run pop: '.$pop;
      $this->redis->lPop('char');
    }

    echo '</br>';
    print_r($this->redis->lRange('char', 0, -1));
  }

}

$index = new Index();
$index->redisTest();


