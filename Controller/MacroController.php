<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Macro;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MacroController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/macro", name="add_macro")
     */
    public function addMacroAction(Request $request)
    {    
        $object = new Macro();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/macro/{id}", name="get_macro")
    */
    public function readMacroAction($id)
    {
        $object = new Macro($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/macro/{id}", name="update_macro")
	*/
    public function updateMacroAction($id)
    {

    }

    /**
    * @Route("/delete/macro/{id}", name="delete_macro")
    */
    public function deleteMacroAction($ticket_id)
    {
        $object = new Macro($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
