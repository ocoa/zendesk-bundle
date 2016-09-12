<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Request as ZDRequest;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RequestController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/request", name="add_request")
     */
    public function addRequestAction(Request $request)
    {    
        $object = new ZDRequest();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/request/{id}", name="get_request")
    */
    public function readRequestAction($id)
    {
        $object = new ZDRequest($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/request/{id}", name="update_request")
	*/
    public function updateRequestAction($id)
    {

    }

    /**
    * @Route("/delete/request/{id}", name="delete_request")
    */
    public function deleteRequestAction($ticket_id)
    {
        $object = new ZDRequest($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
