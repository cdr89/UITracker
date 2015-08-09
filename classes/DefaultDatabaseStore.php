<?php

require_once('DatabaseStore.php');

/**
 * DefaultDatabaseStore store event data into a default MySQL schema
 * database name:   uitracker
 * table:           UserEvent
 * use the script sql/uitrackerDefaultDBSchema.sql
 * to generate the default schema in your MySQL instance.
 *
 * @author Domenico Rosario Caldesi, <d.r.caldesi@gmail.com>
 */
class DefaultDatabaseStore extends DatabaseStore
{

    const DB_HOST = "localhost";
    const DB_NAME = "uitracker";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "root";
    const TABLE_USER_EVENT = "UserEvent";

    /**
     * Store an event into the default MySQL Database
     * database name:   uitracker
     * table:           UserEvent
     *
     * database and table sql script: sql/uitrackerDefaultDBSchema.sql
     */
    public function storeEvent(Event $event)
    {
        $link = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD);
        $statement = $link->prepare("
                INSERT INTO " . self::TABLE_USER_EVENT . "(category, action, label, value, userId, userToken, ipAddress, dateTime)
                VALUES(:category, :action, :label, :value, :userId, :userToken, :ipAddress, :dateTime)
            ");
        $statement->execute(array(
            "category" => $event->category,
            "action" => $event->action,
            "label" => $event->label,
            "value" => $event->value,
            "userId" => $event->userId,
            "userToken" => $event->userToken,
            "ipAddress" => $event->ipAddress,
            "dateTime" => $event->dateTime
        ));
    }

} /* end of class DefaultDatabaseStore */

?>