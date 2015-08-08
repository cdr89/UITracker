<?php

require_once('EventStore.php');

/**
 *
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
class Event
{

    /**
     * Short description of attribute category
     */
    public $category = null;

    /**
     * Short description of attribute action
     */
    public $action = null;

    /**
     * Short description of attribute label
     */
    public $label = null;

    /**
     * Short description of attribute value
     */
    public $value = null;

    /**
     * Short description of attribute userId
     */
    public $userId = null;

    /**
     * Short description of attribute userToken
     */
    public $userToken = null;

    /**
     * Short description of attribute ipAddress
     */
    public $ipAddress = null;

    /**
     * Short description of attribute dateTime
     */
    public $dateTime = null;

} /* end of class Event */

?>