<?php

namespace RIPS\ConnectorBundle\Hydrators\Application;

use stdClass;
use DateTime;
use RIPS\ConnectorBundle\Entities\Application\UploadEntity;
use RIPS\ConnectorBundle\Hydrators\UserHydrator;
use RIPS\ConnectorBundle\Hydrators\ApplicationHydrator;

class UploadHydrator
{
    /**
     * Hydrate a collection of upload objects into a collection of
     * UploadEntity objects
     *
     * @param stdClass[] $uploads
     * @return UploadEntity[]
     */
    public static function hydrateCollection(array $uploads)
    {
        $hydrated = [];

        foreach ($uploads as $upload) {
            $hydrated[] = self::hydrate($upload);
        }

        return $hydrated;
    }

    /**
     * Hydrate a upload object into a UploadEntity object
     *
     * @param stdClass $upload
     * @return UploadEntity
     */
    public static function hydrate(stdClass $upload)
    {
        $hydrated = new UploadEntity;

        if (isset($upload->id)) {
            $hydrated->setId($upload->id);
        }

        if (isset($upload->created_at)) {
            $hydrated->setCreatedAt(new DateTime($upload->created_at));
        }

        if (isset($upload->name)) {
            $hydrated->setName($upload->name);
        }

        if (isset($upload->extension)) {
            $hydrated->setExtension($upload->extension);
        }

        if (isset($upload->size)) {
            $hydrated->setSize($upload->size);
        }

        if (isset($upload->file)) {
            $hydrated->setFile($upload->file);
        }

        if (isset($upload->created_by)) {
            $hydrated->setCreatedBy(UserHydrator::hydrate($upload->created_by));
        }

        if (isset($upload->application)) {
            $hydrated->setApplication(ApplicationHydrator::hydrate($upload->application));
        }

        if (isset($upload->checksum)) {
            $hydrated->setChecksum($upload->checksum);
        }

        return $hydrated;
    }
}
