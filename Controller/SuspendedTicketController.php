<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\SuspendedTicket;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SuspendedTicketController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/suspended_ticket", name="add_suspended_ticket")
     */
    public function addSuspendedTicketAction(Request $request)
    {    
        $object = new SuspendedTicket();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/suspended_ticket/{id}", name="get_suspended_ticket")
    */
    public function readSuspendedTicketAction($id)
    {
        $object = new SuspendedTicket($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/suspended_ticket/{id}", name="update_suspended_ticket")
	*/
    public function updateSuspendedTicketAction($id)
    {

    }

    /**
    * @Route("/delete/suspended_ticket/{id}", name="delete_suspended_ticket")
    */
    public function deleteSuspendedTicketAction($ticket_id)
    {
        $object = new SuspendedTicket($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
