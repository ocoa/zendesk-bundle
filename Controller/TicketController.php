<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Ticket;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TicketController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/ticket", name="add_ticket")
     */
    public function addTicketAction(Request $request)
    {    
        $object = new Ticket();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/ticket/{id}", name="get_ticket")
    */
    public function readTicketAction($id)
    {
        $object = new Ticket($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/ticket/{id}", name="update_ticket")
	*/
    public function updateTicketAction($id)
    {

    }

    /**
    * @Route("/delete/ticket/{id}", name="delete_ticket")
    */
    public function deleteTicketAction($ticket_id)
    {
        $object = new Ticket($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
