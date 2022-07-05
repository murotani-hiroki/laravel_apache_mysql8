<?php

namespace Tests\Unit;

use App\Models\TradeList;
use App\Service\TradeRepository;
use App\Service\FxService;
use stdClass;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase as TestCase;

class FxServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *@test
     * @return void
     */
    public function search()
    {
        $result = new stdClass();
        $result->id = 1;
        $result->trading_date = '2020-07-06';
        $result->settlement_date = '2020-07-07';
        $result->currency_pair = 'USD/JPY';
        $result->trade_type = 2;
        $result->quantity = 10000;
        $result->entry_price = 130;
        $result->exit_price = 131;
        $result->stop_loss = 10;
        $result->profit = 100000;
        $result->comment = '';
        $trade = new TradeList($result);
        $tradeRepositoryMock = \Mockery::mock(TradeRepository::class);
        $tradeRepositoryMock->shouldReceive('search')->with('2020-07-06', '2020-07-06')->andReturn([$trade]);
        $this->instance(TradeRepository::class, $tradeRepositoryMock);
        //$currencyPairRepositoryMock = \Mockery::mock(CurrencyPairRepository::class);

        $fxService = $this->app[FxService::class];
        $results = $fxService->search('2020-07-06', '2020-07-06');

        $this->assertEquals('2020/07/06', $results[0]->getTradingDate());
        $this->assertEquals('Bid', $results[0]->getTradeType());
    }
}
