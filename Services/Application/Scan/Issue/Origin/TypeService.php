<?php

namespace RIPS\ConnectorBundle\Services\Application\Scan\Issue\Origin;

use RIPS\ConnectorBundle\Services\APIService;
use RIPS\ConnectorBundle\Entities\Application\Scan\Issue\Origin\TypeEntity;
use RIPS\ConnectorBundle\Hydrators\Application\Scan\Issue\Origin\TypeHydrator;

class TypeService
{
    /**
     * @var APIService
     */
    protected $api;

    /**
     * Initialize new IssueService instance
     *
     * @param APIService $api
     */
    public function __construct(APIService $api)
    {
        $this->api = $api;
    }

    /**
     * Get all types for an issue
     *
     * @param array $queryParams
     * @return TypeEntity[]
     */
    public function getAll(array $queryParams = [])
    {
        $types = $this->api
            ->applications()
            ->scans()
            ->issues()
            ->origins()
            ->types()
            ->getAll($queryParams);

        return TypeHydrator::hydrateCollection($types);
    }

    /**
     * Get type for issue by id
     *
     * @param int $typeId
     * @return TypeEntity
     */
    public function getById($typeId)
    {
        $type = $this->api
            ->applications()
            ->scans()
            ->issues()
            ->origins()
            ->types()
            ->getById($typeId);

        return TypeHydrator::hydrate($type);
    }
}