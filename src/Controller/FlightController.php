<?php

namespace App\Controller;

use App\Service\FlightService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class FlightController.
 */
class FlightController extends AbstractController
{
    /**
     * Get the flights filtered by criteria.
     *
     * @param FlightService       $service
     * @param SerializerInterface $serializer
     *
     * @return Response
     *
     * @Route(
     *     "/api/flights",
     *     name="api_get_flights",
     *     methods={"GET"},
     *     format="json"
     * )
     */
    public function getFlights(FlightService $service, SerializerInterface $serializer): Response
    {
        return new Response($serializer->serialize($service->getList(), 'json'));
    }
}
