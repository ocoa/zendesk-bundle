<?php
/**
 * This file has been generated. It will never be generated again until will be deleted manually.
 */

namespace ZendeskBundle\Entity;

/**
 * "Ticket" connector object
 */
require_once __DIR__.'/Definition/TicketDefinition.php';
class Ticket extends Connector
{
	use Definition\TicketDefinition;

    function __construct($auth, $id = NULL)
    {
        $this->setAuth($auth);
        $this->setId($id);
        $this->setMethod(NULL);
    }
}

