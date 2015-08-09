<?php
header ( 'Content-type: application/json' );
require_once('../classes/EventDispatcher.php');
require_once('../classes/Event.php');

/**
 *
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */

/*
 * Build an Event object from the GET/POST request and return it
 */
function buildEvent(){
    $event = new Event();

    if(isset($_REQUEST ['category']))
        $event->category = $_REQUEST ['category'];
    if(isset($_REQUEST ['action']))
        $event->action = $_REQUEST ['action'];
    if(isset($_REQUEST ['label']))
        $event->label = $_REQUEST ['label'];
    if(isset($_REQUEST ['value']))
        $event->value = $_REQUEST ['value'];
    if(isset($_REQUEST ['userId']))
        $event->userId = $_REQUEST ['userId'];
    if(isset($_REQUEST ['userToken']))
        $event->userToken = $_REQUEST ['userToken'];
    $event->ipAddress = $_SERVER['REMOTE_ADDR'];
    $event->dateTime = date('Y-m-d H:i:s');

    return $event;
}

$event = buildEvent();
$eventIsValid = $event->validate();

if($eventIsValid){
    $eventDispatcher = new EventDispatcher();
    $eventDispatcher->dispatchEvent($event);
    $validResponse = array(
        'status' => 'ok'
    );
    exit ( json_encode ( $validResponse ) );
}else{
    $invalidResponse = array(
        'status' => 'error'
    );
    exit ( json_encode ( $invalidResponse ) );
}

?>