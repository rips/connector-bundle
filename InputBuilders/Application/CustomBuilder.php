<?php

namespace RIPS\ConnectorBundle\InputBuilders\Application;

use RIPS\ConnectorBundle\InputBuilders\BaseBuilder;

class CustomBuilder extends BaseBuilder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $default;
    
    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->setFields[] = 'name';
        $this->name = $name;
    
        return $this;
    }

    /**
     * Set default
     *
     * @param boolean $default
     * @return $this
     */
    public function setDefault($default)
    {
        $this->setFields[] = 'default';
        $this->default = $default;

        return $this;
    }
}
