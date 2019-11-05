<?php

namespace App\Controller;

use App\Builder\CriteriaBuilder;
use App\Service\FlightService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request             $request
     * @param FlightService       $service
     * @param SerializerInterface $serializer
     * @param CriteriaBuilder     $builder
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
    public function getFlights(Request $request, FlightService $service, SerializerInterface $serializer, CriteriaBuilder $builder): Response
    {
        $criteria = $builder->build($request->query->all());

        return new Response($serializer->serialize(
            $service->getList(
                $criteria->getFilters(),
                $criteria->getOrderBy(),
                $criteria->getLimit(),
                $criteria->getOffset()
            ),
            'json')
        );
    }
}
