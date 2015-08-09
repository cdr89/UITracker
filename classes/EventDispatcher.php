<?php

require_once('EventStore.php');
require_once('DefaultDatabaseStore.php');

/**
 *
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
class EventDispatcher
{

    /**
     * Short description of attribute eventStore
     */
    private $eventStore = null;

    function __construct()
    {
        $this->eventStore = new DefaultDatabaseStore();
    }

    function __construct1($eventStore)
    {
        $this->eventStore = $eventStore;
    }

    /**
     * Dispatch an Event object to store
     */
    public function dispatchEvent(Event $event)
    {
        $this->eventStore->storeEvent($event);
    }

} /* end of class EventDispatcher */

?>