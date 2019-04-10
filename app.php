<?php
/*include "classes/ActionDispatcherInterface.php";
include "classes/ActionDispatcher.php";
include "classes/Counter.php";*/
require_once("autoload.php");




function onCounterStart($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");

}

function onCounterChange($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");
}


function onCounterFinish($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");
}
/*$counter = new herr\vogt\Counter();

$counter->addAction(herr\vogt\Counter::COUNTER_START, "onCounterStart");
$counter->addAction(herr\vogt\Counter::COUNTER_CHANGE, "onCounterChange");
$counter->addAction(herr\vogt\Counter::COUNTER_FINISH, "onCounterFinish");

$counter->run();*/



/*$counter = new herr\vogt\Counter2();

$counter->addAction(herr\vogt\Counter2::COUNTER_START, "onCounterStart");
$counter->addAction(herr\vogt\Counter2::COUNTER_CHANGE, "onCounterChange");
$counter->addAction(herr\vogt\Counter2::COUNTER_FINISH, "onCounterFinish");

$counter->run();*/

$counter = new herr\vogt\Counter2();

$counter->addAction(herr\vogt\Counter2::COUNTER_START, function($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");
});
$counter->addAction(herr\vogt\Counter2::COUNTER_CHANGE, function($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");
});
$counter->addAction(herr\vogt\Counter2::COUNTER_FINISH, function($type, $source) {
  var_dump("{$type} : count = {$source->getCount()}");
});

$counter->run();



 ?>
