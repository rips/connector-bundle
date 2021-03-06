<?php

namespace RIPS\ConnectorBundle\Entities\Application\Scan\Issue;

use DateTime;
use RIPS\ConnectorBundle\Entities\Application\Scan\IssueEntity;
use RIPS\ConnectorBundle\Entities\UserEntity;

class CommentEntity
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var UserEntity
     */
    protected $createdBy;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var IssueEntity
     */
    protected $issue;

    /**
     * Set id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param UserEntity $createdBy
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return UserEntity
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set source
     *
     * @param string $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set issue
     *
     * @param IssueEntity $issue
     * @return $this
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     * @return IssueEntity
     */
    public function getIssue()
    {
        return $this->issue;
    }
}
