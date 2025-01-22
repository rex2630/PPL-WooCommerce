<?php

namespace PPLCZ\Model\Model;

class UpdateShipmentBankAccountModel extends \ArrayObject
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
     * @var float|null
     */
    protected $bankAccountId;
    /**
     * 
     *
     * @return float|null
     */
    public function getBankAccountId() : ?float
    {
        return $this->bankAccountId;
    }
    /**
     * 
     *
     * @param float|null $bankAccountId
     *
     * @return self
     */
    public function setBankAccountId(?float $bankAccountId) : self
    {
        $this->initialized['bankAccountId'] = true;
        $this->bankAccountId = $bankAccountId;
        return $this;
    }
}