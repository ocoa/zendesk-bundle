<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\GroupMemberships;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GroupMembershipsController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/group_memberships", name="add_group_memberships")
     */
    public function addGroupMembershipsAction(Request $request)
    {    
        $object = new GroupMemberships();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/group_memberships/{id}", name="get_group_memberships")
    */
    public function readGroupMembershipsAction($id)
    {
        $object = new GroupMemberships($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/group_memberships/{id}", name="update_group_memberships")
	*/
    public function updateGroupMembershipsAction($id)
    {

    }

    /**
    * @Route("/delete/group_memberships/{id}", name="delete_group_memberships")
    */
    public function deleteGroupMembershipsAction($ticket_id)
    {
        $object = new GroupMemberships($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
