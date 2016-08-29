<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\User;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/user", name="add_user")
     */
    public function addUserAction(Request $request)
    {    
        $object = new User();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/user/{id}", name="get_user")
    */
    public function readUserAction($id)
    {
        $object = new User($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/user/{id}", name="update_user")
	*/
    public function updateUserAction($id)
    {

    }

    /**
    * @Route("/delete/user/{id}", name="delete_user")
    */
    public function deleteUserAction($ticket_id)
    {
        $object = new User($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
