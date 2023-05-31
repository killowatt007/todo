<?php
namespace bs\lib;
defined('EXE') or die('Access');

class Helper
{
  public function formatDate($date)
  {
    return date("d.m.Y", strtotime($date));
  }
}