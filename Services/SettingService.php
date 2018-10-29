<?php

namespace RIPS\ConnectorBundle\Services;

use RIPS\ConnectorBundle\Hydrators\SettingHydrator;
use RIPS\ConnectorBundle\InputBuilders\SettingBuilder;
use RIPS\ConnectorBundle\Entities\SettingEntity;

class SettingService
{
    /**
     * @var APIService
     */
    protected $api;

    /**
     * Initialize new OrgService instance
     *
     * @param APIService
     */
    public function __construct(APIService $api)
    {
        $this->api = $api;
    }

    /**
     * Get all settings
     *
     * @param array $queryParams
     * @return SettingEntity[]
     */
    public function getAll(array $queryParams = [])
    {
        $settings = $this->api->settings()->getAll($queryParams);

        return SettingHydrator::hydrateCollection($settings->getDecodedData());
    }

    /**
     * Get a quota by id
     *
     * @param string $key
     * @param array $queryParams
     * @return SettingEntity
     */
    public function getByKey($key, array $queryParams = [])
    {
        $setting = $this->api->settings()->getByKey($key, $queryParams);

        return SettingHydrator::hydrate($setting->getDecodedData());
    }

    /**
     * Create or update a quota
     *
     * @param string $key
     * @param SettingBuilder $input
     * @param array $queryParams
     * @return SettingEntity
     */
    public function createOrUpdate($key, SettingBuilder $input, array $queryParams = [])
    {
        $setting = $this->api->settings()->createOrUpdate($key, $input->toArray(), $queryParams);

        return SettingHydrator::hydrate($setting->getDecodedData());
    }

    /**
     * Delete all settings
     *
     * @param array $queryParams
     * @return void
     */
    public function deleteAll(array $queryParams = [])
    {
        $this->api->settings()->deleteAll($queryParams);
    }

    /**
     * Delete quota by id
     *
     * @param string $key
     * @param array $queryParams
     * @return void
     */
    public function deleteByKey($key, array $queryParams = [])
    {
        $this->api->settings()->deleteByKey($key, $queryParams);
    }
}
