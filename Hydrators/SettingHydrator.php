<?php

namespace RIPS\ConnectorBundle\Hydrators;

use stdClass;
use DateTime;
use RIPS\ConnectorBundle\Entities\SettingEntity;

class SettingHydrator
{
    /**
     * Hydrate a collection of settings objects into a SettingEntity
     * collection
     *
     * @param array $settings
     * @return SettingEntity[]
     */
    public static function hydrateCollection(array $settings)
    {
        $hydrated = [];

        foreach ($settings as $setting) {
            $hydrated[] = self::hydrate($setting);
        }

        return $hydrated;
    }

    /**
     * Hydrate a setting object into a SettingEntity
     *
     * @param \stdClass $setting
     * @return SettingEntity
     */
    public static function hydrate(stdClass $setting)
    {
        $hydrated = new SettingEntity();

        if (isset($setting->key)) {
            $hydrated->setKey($setting->key);
        }

        if (isset($setting->value)) {
            $hydrated->setValue($setting->value);
        }

        if (isset($setting->created_at)) {
            $hydrated->setCreatedAt(new DateTime($setting->created_at));
        }

        return $hydrated;
    }
}
