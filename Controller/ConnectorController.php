<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Connector;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ConnectorController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/connector", name="add_connector")
     */
    public function addConnectorAction(Request $request)
    {    
        $object = new Connector();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/connector/{id}", name="get_connector")
    */
    public function readConnectorAction($id)
    {
        $object = new Connector($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/connector/{id}", name="update_connector")
	*/
    public function updateConnectorAction($id)
    {

    }

    /**
    * @Route("/delete/connector/{id}", name="delete_connector")
    */
    public function deleteConnectorAction($ticket_id)
    {
        $object = new Connector($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
