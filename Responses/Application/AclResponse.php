<?php

namespace RIPS\ConnectorBundle\Responses\Application;

use RIPS\Connector\Entities\Response;
use RIPS\ConnectorBundle\Responses\BaseResponse;
use RIPS\ConnectorBundle\Entities\Application\AclEntity;
use RIPS\ConnectorBundle\Hydrators\Application\AclHydrator;

class AclResponse extends BaseResponse
{
    /** @var AclEntity */
    private $acl;

    /**
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        parent::__construct($response);
        $this->acl = AclHydrator::hydrate($response->getDecodedData());
    }

    /**
     * @return AclEntity
     */
    public function getAcl()
    {
        return $this->acl;
    }
}
