<?php

namespace herr\vogt;
class Counter2 implements ActionDispatcherInterface {

   public const COUNTER_START = "counterStart";
   public const COUNTER_CHANGE = "counterChange";
   public const COUNTER_FINISH = "counterFinish";


   public $start;
   public $end;
   public $step;

   protected $count;

   protected $ad;


   public function __construct($start = 0, $end = 10, $step = 1) {
     $this->reset($start, $end, $step);
     $this->ad = new ActionDispatcher();
   }

   public function hasAction($type) {
     return $this->ad->hasAction($type);
   }

   public function addAction($type, $action) {
     return $this->ad->addAction($type, $action);
   }

   public function removeAction($type) {
     return $this->ad->removeAction($type);
   }

   public function dispatchAction($type, $source) {
     $this->ad->dispatchAction($type, $source);
   }

   public function getActions() {
     return $this->ad->getActions();
   }


   public function reset($start, $end, $step) {
     $this->start = $start;
     $this->end = $end;
     $this->step = $step;

     $this->count = 0;
   }

   public function getCount() {
     return $this->count;
   }

   public function run() {
     $this->dispatchAction(Counter::COUNTER_START, $this);
     for(; $this->count < $this->end; $this->count += $this->step) {
       $this->dispatchAction(Counter::COUNTER_CHANGE, $this);
     }
     $this->dispatchAction(Counter::COUNTER_FINISH, $this);
   }
 }
