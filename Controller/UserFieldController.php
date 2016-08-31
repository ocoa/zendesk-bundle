<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\UserField;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserFieldController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/user_field", name="add_user_field")
     */
    public function addUserFieldAction(Request $request)
    {    
        $object = new UserField();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/user_field/{id}", name="get_user_field")
    */
    public function readUserFieldAction($id)
    {
        $object = new UserField($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/user_field/{id}", name="update_user_field")
	*/
    public function updateUserFieldAction($id)
    {

    }

    /**
    * @Route("/delete/user_field/{id}", name="delete_user_field")
    */
    public function deleteUserFieldAction($ticket_id)
    {
        $object = new UserField($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
