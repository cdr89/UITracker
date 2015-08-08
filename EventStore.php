<?php

/**
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
abstract class EventStore
{

    /**
     * Store an event
     */
    public abstract function storeEvent(Event $event);

} /* end of abstract class EventStore */

?>