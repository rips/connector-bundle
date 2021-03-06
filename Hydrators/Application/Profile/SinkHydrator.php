<?php

namespace RIPS\ConnectorBundle\Hydrators\Application\Profile;

use stdClass;
use RIPS\ConnectorBundle\Entities\Application\Profile\SinkEntity;
use RIPS\ConnectorBundle\Hydrators\Application\Scan\Issue\TypeHydrator;

class SinkHydrator
{
    /**
     * Hydrate a collection of sink objects into a collection of
     * SinkEntity objects
     *
     * @param stdClass[] $sinks
     * @return SinkEntity[]
     */
    public static function hydrateCollection(array $sinks)
    {
        $hydrated = [];

        foreach ($sinks as $sink) {
            $hydrated[] = self::hydrate($sink);
        }

        return $hydrated;
    }

    /**
     * Hydrate a sink object into a SinkEntity object
     *
     * @param stdClass $sink
     * @return SinkEntity
     */
    public static function hydrate(stdClass $sink)
    {
        $hydrated = new SinkEntity();

        if (isset($sink->id)) {
            $hydrated->setId($sink->id);
        }

        if (isset($sink->class)) {
            $hydrated->setClass($sink->class);
        }

        if (isset($sink->method)) {
            $hydrated->setMethod($sink->method);
        }

        if (isset($sink->parameter)) {
            $hydrated->setParameter($sink->parameter);
        }

        if (isset($sink->type)) {
            $hydrated->setType(TypeHydrator::hydrate($sink->type));
        }

        return $hydrated;
    }
}
