<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('max_execution_time', '300');
ini_set('default_charset', 'UTF-8');

define('EXE', 1);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

function p($arr, $isexit = true)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';

  if ($isexit)
  {
    exit();
  }
}

include ROOT .'/lib/app/f.php';
$app = \F::getApp();
$app->exe();