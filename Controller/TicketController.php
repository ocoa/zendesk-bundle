<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Ticket;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;
use ZendeskBundle\Entity\Auth;

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

        $this->createTicketStub();
        $auth = $this->createAuthStub();
        $object = new Ticket($auth);
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
     * @Route("/get/ticket/{id}", name="get_ticket")
     */
    public function readTicketAction($id)
    {
        $auth = $this->createAuthStub();
        $object = new Ticket($auth, $id);
        $object = $object->read();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	 * @Route("/update/ticket/{id}", name="update_ticket")
	 */
    public function updateTicketAction($id)
    {
        $this->updateTicketStub();
        $auth = $this->createAuthStub();
        $object = new Ticket($auth, $id);
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
     * @Route("/delete/ticket/{id}", name="delete_ticket")
     */
    public function deleteTicketAction($id)
    {
        $auth = $this->createAuthStub();
        $object = new Ticket($auth, $id);
        $object->remove();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    private function createAuthStub()
    {
        $auth = new Auth();
        $auth->setEmailAddress("shawn@ocoa.com");
        $auth->setToken("w5aRxzETWa8cQpzn5KrxTDqhU9BCuzI8PgtNI1sp");
        $auth->setSubDomain("https://solodev.zendesk.com");
        $auth->setPortNUmber(":443");
        $auth->setEndPoint("/api/v2/");

        return $auth;
    }

    private function createTicketStub()
    {
        $_REQUEST['subject'] = "Test Subject";
        $_REQUEST['description'] = "Test description The quick brown fox jumps over the lazy dog";
        $_REQUEST['priority'] = "normal";
    }

    private function updateTicketStub()
    {
        $_REQUEST['priority'] = "high";
    }

}
