<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TripController.
 */
class TripController extends AbstractController
{
    /**
     * Create a trip.
     *
     * @return Response
     *
     * @Route(
     *     "/api/trip",
     *     name="api_post_trip",
     *     methods={"POST"},
     *     format="json"
     * )
     */
    public function createTrip($token): Response
    {
        return new Response($token, Response::HTTP_CREATED);
    }
}
