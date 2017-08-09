<?php

namespace RIPS\ConnectorBundle\Hydrators;

use RIPS\ConnectorBundle\Entities\UserEntity;

class UserHydrator
{
    public static function hydrateCollection(array $users)
    {
        $hydrated = [];

        foreach ($users as $user) {
            $hydrated[] = self::hydrate($user);
        }

        return $hydrated;
    }

    public static function hydrate(\stdClass $user)
    {
        $hydrated = new UserEntity();

        $hydrated->setId($user->id);
        $hydrated->setUsername($user->username ?? '');
        $hydrated->setFirstname($user->firstname ?? '');
        $hydrated->setLastname($user->lastname ?? '');
        $hydrated->setEmail($user->email);
        $hydrated->setEnabled($user->enabled);
        $hydrated->setEmptyUsername($user->empty_username);
        $hydrated->setRoot($user->root);
        $hydrated->setRoles($user->roles);

        if (isset($user->organisation)) {
            $hydrated->setOrganisation(OrgHydrator::hydrate($user->organisation));
        }

        return $hydrated;
    }
}
