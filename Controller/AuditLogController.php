<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\AuditLog;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AuditLogController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/audit_log", name="add_audit_log")
     */
    public function addAuditLogAction(Request $request)
    {    
        $object = new AuditLog();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/audit_log/{id}", name="get_audit_log")
    */
    public function readAuditLogAction($id)
    {
        $object = new AuditLog($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/audit_log/{id}", name="update_audit_log")
	*/
    public function updateAuditLogAction($id)
    {

    }

    /**
    * @Route("/delete/audit_log/{id}", name="delete_audit_log")
    */
    public function deleteAuditLogAction($ticket_id)
    {
        $object = new AuditLog($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}