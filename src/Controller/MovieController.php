<?php 

namespace App\Controller;

use App\Entity\Movie;
use FOS\RestBundle\Controller\FOSRestController; 
use FOS\RestBundle\Controller\Annotations as Rest; 

class MovieController extends FOSRestController 
{
    /**
     * @Rest\Get("/movies", name="get_movies")
     */
    public function movies()
    {
        $em = $this->getDoctrine()->getManager(); 
        $movies = $em->getRepository(Movie::class)->findAll();
        return $this->json(['data' => $movies]); 
    }

    /**
     * @Rest\Get("/movie/{id}", name="get_movie")
     */
    public function movie($id)
    {
        $em = $this->getDoctrine()->getManager(); 
        $movies = $em->getRepository(Movie::class)->find($id);
        return $this->json(['data' => $movies]); 
    }
}