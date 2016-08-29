<?php

namespace ZendeskBundle\Controller;

use ZendeskBundle\Entity\SatisfactionRating;

use ZendeskBundle\Utils\ControllerAbstract;
use ZendeskBundle\Utils\EntityHandling;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SatisfactionRatingController extends ControllerAbstract
{
    use EntityHandling;

    /**
     * @Route("/add/satisfaction_rating", name="add_satisfaction_rating")
     */
    public function addSatisfactionRatingAction(Request $request)
    {    
        $object = new SatisfactionRating();
        $object = $object->persist();
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

    /**
    * @Route("/get/satisfaction_rating/{id}", name="get_satisfaction_rating")
    */
    public function readSatisfactionRatingAction($id)
    {
        $object = new SatisfactionRating($id);
        $data = $this->convertEntity($object);
        return $this->createJsonResponse($data);
    }

	/**
	* @Route("/update/satisfaction_rating/{id}", name="update_satisfaction_rating")
	*/
    public function updateSatisfactionRatingAction($id)
    {

    }

    /**
    * @Route("/delete/satisfaction_rating/{id}", name="delete_satisfaction_rating")
    */
    public function deleteSatisfactionRatingAction($ticket_id)
    {
        $object = new SatisfactionRating($id);
        $object->remove();
        $object->persist();  
        return $this->createJsonResponse(1);     
    }

}
