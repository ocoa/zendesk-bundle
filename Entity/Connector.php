<?php
/**
 * This file has been generated. It will never be generated again until will be deleted manually.
 */

namespace ZendeskBundle\Entity;

use ZendeskBundle\Utils\Name as Name;

/**
 * "Connector" connector object
 */
require_once __DIR__.'/Definition/ConnectorDefinition.php';
class Connector
{
	use Definition\ConnectorDefinition;

    private function buildUrl($id)
    {
        $classname = explode("\\", get_class($this));
        $classname = strtolower(end($classname));
        $nameObj = new Name("");
        $classname = $nameObj->processPlural($classname);
        $extension = "";
        $Url = "" .$this->auth->getSubDomain(). "" .$this->auth->getPortNUmber(). "" .$this->auth->getEndPoint(). "" .$classname. "";
        if ($id)
        {
            $extension =  "/" .$id. "";
        }
        $extension .= ".json";

        $Url .= $extension;

        return $Url;
    }

    private function execute($endPoint, $method, $id = null, $params = null)
    {
        $apiUrl = 'curl -u ' .$this->auth->getEmailAddress(). '/token:' .$this->auth->getToken(). ' ' .$endPoint. '';
        if ($params)
        {
            $apiUrl .= ' -d "' .str_replace("\"", "\\\"", $params). '" -H "Content-Type: application/json"';
            if ($method == "Update")
            {
                $apiUrl .= ' -X PUT';
            }
            else if ($method == "Create")
            {
                $apiUrl .= ' -X POST';
            }
            else if ($method == "Delete") {
                $apiUrl .= ' -X DELETE';
            }
        }
        $apiUrl .= ' -v';

        exec($apiUrl, $response, $retVal);
        return $response;
    }

    public function persist()
    {
        $id = $this->getId();
        if (!$this->getMethod()) {
            if ($id) {
                $method = "Update";
            }
            else {
                $method = "Create";
            }
            $this->setMethod($method);
        }
        $params = $this->buildParams();
        $endPoint = $this->buildUrl($id);
        $newTicket = $this->execute($endPoint, $this->getMethod(), $id, $params);

        return $newTicket;
    }

    public function read()
    {
        $this->setMethod("Read");
        $id = $this->getId();
        $endPoint = $this->buildUrl($id);
        $ticket = $this->execute($endPoint, $this->getMethod());

        return $ticket;
    }

    public function remove()
    {
        $this->setMethod("Delete");
    }

    function __construct($auth)
    {

    }

    private function buildParams()
    {
        // Loop through all the parameters in the request and use setters to set all of them in the ticket entity.
        $params = array();
        foreach ($_REQUEST as $key => $value) {
            $params[$key] = $value;
        }
        $ticket = array('ticket' => $params);
        return json_encode($ticket);
    }
}

