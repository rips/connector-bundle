<?php

namespace RIPS\ConnectorBundle\Services;

use Exception;
use RIPS\Connector\API;
use RIPS\ConnectorBundle\Responses\StatusResponse;

class APIService
{
    /**
     * @var API
     */
    protected $api;

    /**
     * APIService constructor.
     *
     * @param $email
     * @param $password
     * @param $config
     * @throws Exception
     */
    public function __construct($email, $password, $config)
    {
        $this->initialize($email, $password, $config);
    }

    /**
     * Initialize API instance
     *
     * @param $email
     * @param $password
     * @param $config
     * @return void
     * @throws Exception
     */
    public function initialize($email, $password, $config)
    {
        $this->api = new API($email, $password, $config);
    }

    /**
     * Callback requests accessor
     *
     * @return \RIPS\Connector\Requests\CallbackRequests
     */
    public function callbacks()
    {
        return $this->api->callbacks;
    }

    /**
     * Activity requests accessor
     *
     * @return \RIPS\Connector\Requests\ActivityRequests
     */
    public function activities()
    {
        return $this->api->activities;
    }

    /**
     * Application requests accessor
     *
     * @return \RIPS\Connector\Requests\ApplicationRequests
     */
    public function applications()
    {
        return $this->api->applications;
    }

    /**
     * License requests accessor
     *
     * @return \RIPS\Connector\Requests\LicenseRequests
     */
    public function licenses()
    {
        return $this->api->licenses;
    }

    /**
     * Log requests accessor
     *
     * @return \RIPS\Connector\Requests\LogRequests
     */
    public function logs()
    {
        return $this->api->logs;
    }

    /**
     * Org requests accessor
     *
     * @return \RIPS\Connector\Requests\OrgRequests
     */
    public function orgs()
    {
        return $this->api->orgs;
    }

    /**
     * Quota requests accessor
     *
     * @return \RIPS\Connector\Requests\QuotaRequests
     */
    public function quotas()
    {
        return $this->api->quotas;
    }

    /**
     * Setting requests accessor
     *
     * @return \RIPS\Connector\Requests\SettingRequests
     */
    public function settings()
    {
        return $this->api->settings;
    }

    /**
     * Source requests accessor
     *
     * @return \RIPS\Connector\Requests\SourceRequests
     */
    public function sources()
    {
        return $this->api->sources;
    }

    /**
     * Team requests accessor
     *
     * @return \RIPS\Connector\Requests\TeamRequests
     */
    public function teams()
    {
        return $this->api->teams;
    }

    /**
     * User requests accessor
     *
     * @return \RIPS\Connector\Requests\UserRequests
     */
    public function users()
    {
        return $this->api->users;
    }

    /**
     * Oauth2 request accessor
     *
     * @return \RIPS\Connector\Requests\OAuth2Requests
     */
    public function oauth2()
    {
        return $this->api->oauth2;
    }

    /**
     * Maintenance requests accessor
     *
     * @return \RIPS\Connector\Requests\MaintenanceRequests
     */
    public function maintenance()
    {
        return $this->api->maintenance;
    }

    /**
     * @return \RIPS\Connector\Requests\LanguageRequests
     */
    public function languages()
    {
        return $this->api->languages;
    }

    /**
     * @return \RIPS\Connector\Requests\SystemRequests
     */
    public function systems()
    {
        return $this->api->systems;
    }

    /**
     * Get status of current session from API
     *
     * @return StatusResponse
     */
    public function getStatus()
    {
        $response = $this->api->status->getStatus();

        return new StatusResponse($response);
    }
}
