<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\JobStatus;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class JobStatusController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/job_status", name="add_job_status")
     */
    public function addJobStatusAction(Request $request)
    {    
        $object = new JobStatus();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/job_status/{id}", name="get_job_status")
    */
    public function readJobStatusAction($id)
    {
        $object = new JobStatus($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/job_status/{id}", name="update_job_status")
	*/
    public function updateJobStatusAction($id)
    {

    }

    /**
    * @Route("/delete/job_status/{id}", name="delete_job_status")
    */
    public function deleteJobStatusAction($ticket_id)
    {
        $object = new JobStatus($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
