<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Search;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SearchController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/search", name="add_search")
     */
    public function addSearchAction(Request $request)
    {    
        $object = new Search();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/search/{id}", name="get_search")
    */
    public function readSearchAction($id)
    {
        $object = new Search($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/search/{id}", name="update_search")
	*/
    public function updateSearchAction($id)
    {

    }

    /**
    * @Route("/delete/search/{id}", name="delete_search")
    */
    public function deleteSearchAction($ticket_id)
    {
        $object = new Search($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
