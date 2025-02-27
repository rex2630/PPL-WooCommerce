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
     * @var bool|null
     */
    protected $pplDisabledParcelBox;
    /**
     * 
     *
     * @var bool
     */
    protected $pplDisabledAlzaBox;
    /**
     * 
     *
     * @var bool|null
     */
    protected $pplDisabledParcelShop;
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
    public function getPplDisabledParcelBox() : ?bool
    {
        return $this->pplDisabledParcelBox;
    }
    /**
     * 
     *
     * @param bool|null $pplDisabledParcelBox
     *
     * @return self
     */
    public function setPplDisabledParcelBox(?bool $pplDisabledParcelBox) : self
    {
        $this->initialized['pplDisabledParcelBox'] = true;
        $this->pplDisabledParcelBox = $pplDisabledParcelBox;
        return $this;
    }
    /**
     * 
     *
     * @return bool
     */
    public function getPplDisabledAlzaBox() : ?bool
    {
        return $this->pplDisabledAlzaBox;
    }
    /**
     * 
     *
     * @param bool $pplDisabledAlzaBox
     *
     * @return self
     */
    public function setPplDisabledAlzaBox(bool $pplDisabledAlzaBox) : self
    {
        $this->initialized['pplDisabledAlzaBox'] = true;
        $this->pplDisabledAlzaBox = $pplDisabledAlzaBox;
        return $this;
    }
    /**
     * 
     *
     * @return bool|null
     */
    public function getPplDisabledParcelShop() : ?bool
    {
        return $this->pplDisabledParcelShop;
    }
    /**
     * 
     *
     * @param bool|null $pplDisabledParcelShop
     *
     * @return self
     */
    public function setPplDisabledParcelShop(?bool $pplDisabledParcelShop) : self
    {
        $this->initialized['pplDisabledParcelShop'] = true;
        $this->pplDisabledParcelShop = $pplDisabledParcelShop;
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