<?php
namespace App\Models;

class CurrencyPair
{
    private $id;

    private $currencyPair;

    public function __construct(\stdClass $data) {
        $this->id = $data->id;
        $this->currencyPair = $data->currency_pair;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of currencyPair
     */ 
    public function getCurrencyPair()
    {
        return $this->currencyPair;
    }

    /**
     * Set the value of currencyPair
     *
     * @return  self
     */ 
    public function setCurrencyPair($currencyPair)
    {
        $this->currencyPair = $currencyPair;

        return $this;
    }
}