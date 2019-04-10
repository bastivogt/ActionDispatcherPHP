<?php

 namespace herr\vogt;
 interface ActionDispatcherInterface {
   function hasAction($type);
   function addAction($type, $action);
   function removeAction($type);
   function dispatchAction($type, $source);
   function getActions();
 }
