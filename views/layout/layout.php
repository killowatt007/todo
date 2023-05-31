<?php
namespace app\views;
defined('EXE') or die('Access');

class Layout extends \app\lib\View
{
  private $childHtml = '';

  public function setChildHtml($html)
  {
    $this->childHtml = $html;
  }

  public function getChildHtml()
  {
    return $this->childHtml;
  }
}