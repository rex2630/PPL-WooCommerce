<?php

namespace PPLCZ\Model\Model;

class CategoryModel extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string[]|null
     */
    protected $pplDisabledTransport;
    /**
     * 
     *
     * @return string[]|null
     */
    public function getPplDisabledTransport() : ?array
    {
        return $this->pplDisabledTransport;
    }
    /**
     * 
     *
     * @param string[]|null $pplDisabledTransport
     *
     * @return self
     */
    public function setPplDisabledTransport(?array $pplDisabledTransport) : self
    {
        $this->initialized['pplDisabledTransport'] = true;
        $this->pplDisabledTransport = $pplDisabledTransport;
        return $this;
    }
}