<?php

namespace App\Models;

class TradeList
{
    /** @var int ID */
    private $id;

    /** @var string 取引日 */
    private $tradingDate;

    /** @var string 決済日 */
    private $settlementDate;

    /** @var string 通貨ペア */
    private $currencyPair;

    /** @var int Ask/Bid */
    private $tradeType;

    /** @var int 数量 */
    private $quantity;

    /** @var float Entry価格 */
    private $entryPrice;

    /** @var float Exit価格 */
    private $exitPrice;

    /** @var int ストップロス */
    private $stopLoss;

    /** @var float 損益 */
    private $profit;

    /** @var string コメント */
    private $comment;
    

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->tradingDate = $data->trading_date;
        $this->settlementDate = $data->settlement_date;
        $this->currencyPair = $data->currency_pair;
        $this->tradeType = $data->trade_type;
        $this->quantity = $data->quantity;
        $this->entryPrice = $data->entry_price;
        $this->exitPrice = $data->exit_price;
        $this->stopLoss = $data->stop_loss;
        $this->profit = $data->profit;
        $this->comment = $data->comment;
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
     * Get the value of settlementDate
     */ 
    public function getSettlementDate() : ?string
    {
        return date('Y/m/d', strtotime($this->settlementDate));
    }

    /**
     * Set the value of settlementDate
     *
     * @return  self
     */ 
    public function setSettlementDate($settlementDate)
    {
        $this->settlementDate = $settlementDate;

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

    /**
     * Get the value of tradingDate
     */ 
    public function getTradingDate() : ?string
    {
        return date('Y/m/d', strtotime($this->tradingDate));
    }

    /**
     * Set the value of tradingDate
     *
     * @return  self
     */ 
    public function setTradingDate($tradingDate)
    {
        $this->tradingDate = $tradingDate;

        return $this;
    }

    /**
     * Get the value of tradeType
     */ 
    public function getTradeType()
    {
        return $this->tradeType == 1 ? 'Ask' : 'Bid';
    }

    /**
     * Set the value of tradeType
     *
     * @return  self
     */ 
    public function setTradeType($tradeType)
    {
        $this->tradeType = $tradeType;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of entryPrice
     */ 
    public function getEntryPrice() : ?float
    {
        return $this->entryPrice;
    }

    /**
     * Set the value of entryPrice
     *
     * @return  self
     */ 
    public function setEntryPrice($entryPrice)
    {
        $this->entryPrice = $entryPrice;

        return $this;
    }

    /**
     * Get the value of exitPrice
     */ 
    public function getExitPrice() : ?float
    {
        return $this->exitPrice;
    }

    /**
     * Set the value of exitPrice
     *
     * @return  self
     */ 
    public function setExitPrice($exitPrice)
    {
        $this->exitPrice = $exitPrice;

        return $this;
    }

    /**
     * Get the value of stopLoss
     */ 
    public function getStopLoss()
    {
        return $this->stopLoss;
    }

    /**
     * Set the value of stopLoss
     *
     * @return  self
     */ 
    public function setStopLoss($stopLoss)
    {
        $this->stopLoss = $stopLoss;

        return $this;
    }

    /**
     * Get the value of profit
     */ 
    public function getProfit() : ?float
    {
        return $this->profit;
    }

    /**
     * Set the value of profit
     *
     * @return  self
     */ 
    public function setProfit($profit)
    {
        $this->profit = $profit;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
}