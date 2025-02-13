<?php

namespace PPLCZ\Model\Model;

class BankAccountModel extends \ArrayObject
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
    protected $id;
    /**
     * 
     *
     * @var string|null
     */
    protected $accountName;
    /**
     * 
     *
     * @var string|null
     */
    protected $account;
    /**
     * 
     *
     * @var string|null
     */
    protected $accountPrefix;
    /**
     * 
     *
     * @var string|null
     */
    protected $bankCode;
    /**
     * 
     *
     * @var string|null
     */
    protected $iban;
    /**
     * 
     *
     * @var string|null
     */
    protected $swift;
    /**
     * 
     *
     * @var string|null
     */
    protected $currency;
    /**
     * 
     *
     * @return float|null
     */
    public function getId() : ?float
    {
        return $this->id;
    }
    /**
     * 
     *
     * @param float|null $id
     *
     * @return self
     */
    public function setId(?float $id) : self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAccountName() : ?string
    {
        return $this->accountName;
    }
    /**
     * 
     *
     * @param string|null $accountName
     *
     * @return self
     */
    public function setAccountName(?string $accountName) : self
    {
        $this->initialized['accountName'] = true;
        $this->accountName = $accountName;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAccount() : ?string
    {
        return $this->account;
    }
    /**
     * 
     *
     * @param string|null $account
     *
     * @return self
     */
    public function setAccount(?string $account) : self
    {
        $this->initialized['account'] = true;
        $this->account = $account;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAccountPrefix() : ?string
    {
        return $this->accountPrefix;
    }
    /**
     * 
     *
     * @param string|null $accountPrefix
     *
     * @return self
     */
    public function setAccountPrefix(?string $accountPrefix) : self
    {
        $this->initialized['accountPrefix'] = true;
        $this->accountPrefix = $accountPrefix;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getBankCode() : ?string
    {
        return $this->bankCode;
    }
    /**
     * 
     *
     * @param string|null $bankCode
     *
     * @return self
     */
    public function setBankCode(?string $bankCode) : self
    {
        $this->initialized['bankCode'] = true;
        $this->bankCode = $bankCode;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getIban() : ?string
    {
        return $this->iban;
    }
    /**
     * 
     *
     * @param string|null $iban
     *
     * @return self
     */
    public function setIban(?string $iban) : self
    {
        $this->initialized['iban'] = true;
        $this->iban = $iban;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSwift() : ?string
    {
        return $this->swift;
    }
    /**
     * 
     *
     * @param string|null $swift
     *
     * @return self
     */
    public function setSwift(?string $swift) : self
    {
        $this->initialized['swift'] = true;
        $this->swift = $swift;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getCurrency() : ?string
    {
        return $this->currency;
    }
    /**
     * 
     *
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency) : self
    {
        $this->initialized['currency'] = true;
        $this->currency = $currency;
        return $this;
    }
}