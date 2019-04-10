<?php

namespace herr\vogt;
class ActionDispatcher implements ActionDispatcherInterface {
  protected $actions;

  public function __construct() {
    $this->actions = array();
  }

  public function getActions() {
    return $this->actions;
  }

  public function hasAction($type) {
    foreach ($this->actions as $key => $value) {
      if(strcmp($key, $type) == 0) {
        return true;
      }
    }
    return false;
  }


  public function addAction($type, $action) {
    if(!$this->hasAction($type)) {
      $this->actions[$type] = $action;
      return true;
    }
    return false;
  }


  public function removeAction($type) {
    if($this->hasAction($type)) {
      unset($this->actions[$type]);
      return true;
    }
    return false;
  }


  public function dispatchAction($type, $source) {
    if($this->hasAction($type)) {
      call_user_func($this->actions[$type], $type, $source);


    }
  }
}
