<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Auth;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AuthController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/auth", name="add_auth")
     */
    public function addAuthAction(Request $request)
    {    
        $object = new Auth();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/auth/{id}", name="get_auth")
    */
    public function readAuthAction($id)
    {
        $object = new Auth($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/auth/{id}", name="update_auth")
	*/
    public function updateAuthAction($id)
    {

    }

    /**
    * @Route("/delete/auth/{id}", name="delete_auth")
    */
    public function deleteAuthAction($ticket_id)
    {
        $object = new Auth($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
