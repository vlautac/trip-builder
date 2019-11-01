<?php

namespace App\Service;

use App\Entity\EntityInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractCrudService.
 */
abstract class AbstractCrudService implements CrudInterface
{
    /**
     * The entity manager.
     *
     * @var EntityRepository
     */
    private $em;

    /**
     * AbstractCrudService constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public function get(array $criteria): EntityInterface
    {
        return $this->em->getRepository($this->getClassName())->find($criteria['id']);
    }

    /**
     * @inheritDoc
     */
    public function getList(array $criterias, array $orderBy = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->em->getRepository($this->getClassName())->findBy($criterias, $orderBy, $limit, $offset);
    }

    /**
     * @inheritDoc
     */
    public function create(EntityInterface $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function update(EntityInterface $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function delete(EntityInterface $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    /**
     * Get the entity class name.
     *
     * @return string
     */
    abstract function getClassName(): string;
}
