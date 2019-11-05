<?php

namespace App\Controller;

use App\Builder\CriteriaBuilder;
use App\Service\AirportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AirportController.
 */
class AirportController extends AbstractController
{
    /**
     * Get the airports filtered by criteria.
     *
     * @param Request             $request
     * @param AirportService      $service
     * @param SerializerInterface $serializer
     * @param CriteriaBuilder     $builder
     *
     * @return Response
     *
     * @Route(
     *     "/api/airports",
     *     name="api_get_airports",
     *     methods={"GET"},
     *     format="json"
     * )
     */
    public function getAirports(Request $request, AirportService $service, SerializerInterface $serializer, CriteriaBuilder $builder): Response
    {
        $criteria = $builder->build($request->query->all());

        return new Response($serializer->serialize(
            $service->getList(
                $criteria->getFilters(),
                $criteria->getOrderBy(),
                $criteria->getLimit(),
                $criteria->getOffset()
            ),
            'json'
        ));
    }
}
