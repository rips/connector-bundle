<?php

namespace RIPS\ConnectorBundle\Hydrators\Application\Scan\Issue;

use RIPS\ConnectorBundle\Hydrators\Application\Scan\IssueHydrator;
use stdClass;
use DateTime;
use RIPS\ConnectorBundle\Entities\Application\Scan\Issue\ReviewEntity;
use RIPS\ConnectorBundle\Hydrators\UserHydrator;
use RIPS\ConnectorBundle\Hydrators\Application\Scan\Issue\Review\TypeHydrator as ReviewTypeHydrator;

class ReviewHydrator
{
    /**
     * Hydrate a collection of review objects into a collection of
     * ReviewEntity objects
     *
     * @param stdClass[] $reviews
     * @return ReviewEntity[]
     */
    public static function hydrateCollection(array $reviews)
    {
        $hydrated = [];

        foreach ($reviews as $review) {
            $hydrated[] = self::hydrate($review);
        }

        return $hydrated;
    }

    /**
     * Hydrate a review object into a ReviewEntity object
     *
     * @param stdClass $review
     * @return ReviewEntity
     */
    public static function hydrate(stdClass $review)
    {
        $hydrated = new ReviewEntity();

        if (isset($review->id)) {
            $hydrated->setId($review->id);
        }

        if (isset($review->created_at)) {
            $hydrated->setCreatedAt(new DateTime($review->created_at));
        }

        if (isset($review->type)) {
            $hydrated->setType(ReviewTypeHydrator::hydrate($review->type));
        }

        if (isset($review->created_by)) {
            $hydrated->setCreatedBy(UserHydrator::hydrate($review->created_by));
        }

        if (isset($review->source)) {
            $hydrated->setSource($review->source);
        }

        if (isset($review->issue)) {
            $hydrated->setIssue(IssueHydrator::hydrate($review->issue));
        }

        return $hydrated;
    }
}
