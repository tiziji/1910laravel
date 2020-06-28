<?php
$redis= new Redis();
$redis->connect('127.0.0.1',6379);
$redis->auth('wobuzhidao');
$k1='name1';
echo $redis->get($k1);