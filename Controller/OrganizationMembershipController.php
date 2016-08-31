<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\OrganizationMembership;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OrganizationMembershipController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/organization_membership", name="add_organization_membership")
     */
    public function addOrganizationMembershipAction(Request $request)
    {    
        $object = new OrganizationMembership();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/organization_membership/{id}", name="get_organization_membership")
    */
    public function readOrganizationMembershipAction($id)
    {
        $object = new OrganizationMembership($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/organization_membership/{id}", name="update_organization_membership")
	*/
    public function updateOrganizationMembershipAction($id)
    {

    }

    /**
    * @Route("/delete/organization_membership/{id}", name="delete_organization_membership")
    */
    public function deleteOrganizationMembershipAction($ticket_id)
    {
        $object = new OrganizationMembership($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
   }

}

   }

}
