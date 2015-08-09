<?php

require_once('EventStore.php');

/**
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
class FileStore extends EventStore
{

    /**
     * Store an event into a file
     */
    public function storeEvent(Event $event)
    {
        //TODO
    }

} /* end of class FileStore */

?>