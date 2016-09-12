<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\GroupMembership;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GroupMembershipController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/group_membership", name="add_group_membership")
     */
    public function addGroupMembershipAction(Request $request)
    {    
        $object = new GroupMembership();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/group_membership/{id}", name="get_group_membership")
    */
    public function readGroupMembershipAction($id)
    {
        $object = new GroupMembership($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/group_membership/{id}", name="update_group_membership")
	*/
    public function updateGroupMembershipAction($id)
    {

    }

    /**
    * @Route("/delete/group_membership/{id}", name="delete_group_membership")
    */
    public function deleteGroupMembershipAction($ticket_id)
    {
        $object = new GroupMembership($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
