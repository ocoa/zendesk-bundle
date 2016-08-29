<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Organization;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrganizationController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/organization", name="add_organization")
     */
    public function addOrganizationAction(Request $request)
    {    
        $object = new Organization();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/organization/{id}", name="get_organization")
    */
    public function readOrganizationAction($id)
    {
        $object = new Organization($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/organization/{id}", name="update_organization")
	*/
    public function updateOrganizationAction($id)
    {

    }

    /**
    * @Route("/delete/organization/{id}", name="delete_organization")
    */
    public function deleteOrganizationAction($ticket_id)
    {
        $object = new Organization($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
