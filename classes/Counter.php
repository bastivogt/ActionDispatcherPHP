<?php

namespace herr\vogt;
class Counter extends ActionDispatcher {

   public const COUNTER_START = "counterStart";
   public const COUNTER_CHANGE = "counterChange";
   public const COUNTER_FINISH = "counterFinish";


   public $start;
   public $end;
   public $step;

   protected $count;


   public function __construct($start = 0, $end = 10, $step = 1) {
     parent::__construct();
     $this->reset($start, $end, $step);
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
