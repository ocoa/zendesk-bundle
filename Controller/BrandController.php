<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Brand;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BrandController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/brand", name="add_brand")
     */
    public function addBrandAction(Request $request)
    {    
        $object = new Brand();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/brand/{id}", name="get_brand")
    */
    public function readBrandAction($id)
    {
        $object = new Brand($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/brand/{id}", name="update_brand")
	*/
    public function updateBrandAction($id)
    {

    }

    /**
    * @Route("/delete/brand/{id}", name="delete_brand")
    */
    public function deleteBrandAction($ticket_id)
    {
        $object = new Brand($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
