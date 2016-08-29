<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Group;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GroupController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/group", name="add_group")
     */
    public function addGroupAction(Request $request)
    {    
        $object = new Group();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/group/{id}", name="get_group")
    */
    public function readGroupAction($id)
    {
        $object = new Group($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/group/{id}", name="update_group")
	*/
    public function updateGroupAction($id)
    {

    }

    /**
    * @Route("/delete/group/{id}", name="delete_group")
    */
    public function deleteGroupAction($ticket_id)
    {
        $object = new Group($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
