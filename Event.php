<?php

require_once('EventStore.php');

/**
 *
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
class Event
{

    /**
     * Event category (mandatory)
     */
    public $category;

    /**
     * User action (mandatory)
     */
    public $action;

    /**
     * Label for @attribute value (optional)
     */
    public $label;

    /**
     * Value for events that expect it (optional)
     */
    public $value;

    /**
     * User id (optional)
     */
    public $userId;

    /**
     * Token used to validate an userId (optional)
     */
    public $userToken;

    /**
     * IP address that has generated the event (mandatory)
     */
    public $ipAddress;

    /**
     * Date and time of the event
     */
    public $dateTime;

} /* end of class Event */

?>