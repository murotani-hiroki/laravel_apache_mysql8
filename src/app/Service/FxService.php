<?php
namespace App\Service;

use App\Models\Trade;

class FxService
{
    private $tradeRepository;

    private $currencyPairRepository;

    public function __construct(TradeRepository $tradeRepository, CurrencyPairRepository $currencyPairRepository)
    {
        $this->tradeRepository = $tradeRepository;
        $this->currencyPairRepository = $currencyPairRepository;
    }

    public function search(?string $fromDate, ?string $toDate) 
    {
        return $this->tradeRepository->search($fromDate, $toDate);
    }

    public function getCurrencyPairs() : array
    {
        return $this->currencyPairRepository->findAll();
    }

    public function save(Trade $trade) 
    {
        if (!$trade->getId()) {
            $this->tradeRepository->insert($trade);
        } else {
            $this->tradeRepository->update($trade);
        }
    }

    public function delete(array $ids) {
        $this->tradeRepository->delete($ids);
    }

    public function find(int $id) : Trade
    {
        return $this->tradeRepository->find($id);
    } 
}