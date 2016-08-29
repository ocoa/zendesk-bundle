<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\OrganizationMemberships;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrganizationMembershipsController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/organization_memberships", name="add_organization_memberships")
     */
    public function addOrganizationMembershipsAction(Request $request)
    {    
        $object = new OrganizationMemberships();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/organization_memberships/{id}", name="get_organization_memberships")
    */
    public function readOrganizationMembershipsAction($id)
    {
        $object = new OrganizationMemberships($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/organization_memberships/{id}", name="update_organization_memberships")
	*/
    public function updateOrganizationMembershipsAction($id)
    {

    }

    /**
    * @Route("/delete/organization_memberships/{id}", name="delete_organization_memberships")
    */
    public function deleteOrganizationMembershipsAction($ticket_id)
    {
        $object = new OrganizationMemberships($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
