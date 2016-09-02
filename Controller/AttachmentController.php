<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\Attachment;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AttachmentController extends ControllerAbstract
{
    use EntityHandling;
 
    /**
     * @Route("/add/attachment", name="add_attachment")
     */
    public function addAttachmentAction(Request $request)
    {    
        $object = new Attachment();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/attachment/{id}", name="get_attachment")
    */
    public function readAttachmentAction($id)
    {
        $object = new Attachment($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/attachment/{id}", name="update_attachment")
	*/
    public function updateAttachmentAction($id)
    {

    }

    /**
    * @Route("/delete/attachment/{id}", name="delete_attachment")
    */
    public function deleteAttachmentAction($ticket_id)
    {
        $object = new Attachment($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
