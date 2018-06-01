<?php

namespace RIPS\ConnectorBundle\Hydrators\Application\Custom;

use stdClass;
use RIPS\ConnectorBundle\Entities\Application\Custom\SettingEntity;
use RIPS\ConnectorBundle\Hydrators\Application\CustomHydrator;
use RIPS\ConnectorBundle\Hydrators\Application\Scan\PhpHydrator;

class SettingHydrator
{
    /**
     * Hydrate a setting object into a SettingEntity object
     *
     * @param stdClass $setting
     * @return SettingEntity
     */
    public static function hydrate(stdClass $setting)
    {
        $hydrated = new SettingEntity();

        if (isset($setting->id)) {
            $hydrated->setId($setting->id);
        }

        if (isset($setting->issue_types)) {
            $hydrated->setIssueTypes($setting->issue_types);
        }

        if (isset($setting->code_stored)) {
            $hydrated->setCodeStored($setting->code_stored);
        }

        if (isset($setting->upload_removed)) {
            $hydrated->setUploadRemoved($setting->upload_removed);
        }

        if (isset($setting->full_code_compared)) {
            $hydrated->setFullCodeCompared($setting->full_code_compared);
        }

        if (isset($setting->history_inherited)) {
            $hydrated->setHistoryInherited($setting->history_inherited);
        }

        if (isset($setting->analysis_depth)) {
            $hydrated->setAnalysisDepth($setting->analysis_depth);
        }

        if (isset($setting->max_issues_per_type)) {
            $hydrated->setMaxIssuesPerType($setting->max_issues_per_type);
        }

        if (isset($setting->php)) {
            $hydrated->setPhp(PhpHydrator::hydrate($setting->php));
        }

        if (isset($setting->custom)) {
            $hydrated->setCustom(CustomHydrator::hydrate($setting->custom));
        }

        return $hydrated;
    }
}
