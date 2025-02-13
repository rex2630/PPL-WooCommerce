<?php

namespace PPLCZ\Model\Model;

class ProductModel extends \ArrayObject
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
     * @var bool|null
     */
    protected $pplConfirmAge15;
    /**
     * 
     *
     * @var bool|null
     */
    protected $pplConfirmAge18;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $pplDisabledTransport;
    /**
     * 
     *
     * @return bool|null
     */
    public function getPplConfirmAge15() : ?bool
    {
        return $this->pplConfirmAge15;
    }
    /**
     * 
     *
     * @param bool|null $pplConfirmAge15
     *
     * @return self
     */
    public function setPplConfirmAge15(?bool $pplConfirmAge15) : self
    {
        $this->initialized['pplConfirmAge15'] = true;
        $this->pplConfirmAge15 = $pplConfirmAge15;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getPplConfirmAge18() : ?bool
    {
        return $this->pplConfirmAge18;
    }
    /**
     * 
     *
     * @param bool|null $pplConfirmAge18
     *
     * @return self
     */
    public function setPplConfirmAge18(?bool $pplConfirmAge18) : self
    {
        $this->initialized['pplConfirmAge18'] = true;
        $this->pplConfirmAge18 = $pplConfirmAge18;
        return $this;
    }
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