<?php

namespace App\Repositories;

use App\Models\Trade;
use App\Models\TradeList;
use App\Service\TradeRepository as ITradeRepository;

class TradeRepository implements ITradeRepository
{
    public function search(?string $fromDate, ?string $toDate) : array
    {
        $results = \DB::table('trade as t')
            ->join('currency_pair as c', 't.currency_pair_id', '=', 'c.id')
            ->select('t.*', 'c.currency_pair')
            ->when($fromDate, function($query, $fromDate) {
                return $query->where('trading_date', '>=', $fromDate);
            })->when($toDate, function ($query, $toDate) {
                return $query->where('trading_date', '<=', $toDate);
            })->orderBy('t.trading_date')
            ->get()->all();

        // stdClass を TradeList に変換して返す。
        return array_map(function ($trade) {
            return new TradeList($trade);
        }, $results);
    }

    public function insert(Trade $trade) : int
    {
        return \DB::table('trade')->insertGetId([
            'trading_date' => $trade->getTradingDate(),
            'settlement_date' => $trade->getSettlementDate(),
            'currency_pair_id' => $trade->getCurrencyPairId(),
            'trade_type' => $trade->getTradeType(),
            'quantity' => $trade->getQuantity(),
            'entry_price' => $trade->getEntryPrice(),
            'exit_price' => $trade->getExitPrice(),
            'stop_loss' => $trade->getStopLoss(),
            'profit' => $trade->getProfit(),
            'comment' => $trade->getComment()
        ]);
    }

    public function update(Trade $trade) : void
    {
        \DB::table('trade')
            ->where('id', $trade->getId())
            ->update([
                'trading_date' => $trade->getTradingDate(),
                'settlement_date' => $trade->getSettlementDate(),
                'currency_pair_id' => $trade->getCurrencyPairId(),
                'trade_type' => $trade->getTradeType(),
                'quantity' => $trade->getQuantity(),
                'entry_price' => $trade->getEntryPrice(),
                'exit_price' => $trade->getExitPrice(),
                'stop_loss' => $trade->getStopLoss(),
                'profit' => $trade->getProfit(),
                'comment' => $trade->getComment()
            ]);
    }

    public function delete(array $ids): void
    {
        \DB::table('trade')->whereIn('id', $ids)->delete();
    }

    public function find(int $id) : Trade
    {
        $trade = \DB::table('trade')->find($id);

        return new Trade($trade);
    }
}