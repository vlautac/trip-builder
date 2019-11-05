<?php

namespace App\Controller;

use App\Builder\CriteriaBuilder;
use App\Service\AirlineService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AirlineController.
 */
class AirlineController extends AbstractController
{
    /**
     * Get the airlines filtered by criteria.
     *
     * @param Request             $request
     * @param AirlineService      $service
     * @param SerializerInterface $serializer
     * @param CriteriaBuilder     $builder
     *
     * @return Response
     *
     * @Route(
     *     "/api/airlines",
     *     name="api_get_airlines",
     *     methods={"GET"},
     *     format="json"
     * )
     */
    public function getAirlines(Request $request, AirlineService $service, SerializerInterface $serializer, CriteriaBuilder $builder): Response
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
