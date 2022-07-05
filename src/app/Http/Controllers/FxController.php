<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Trade;
use App\Service\FxService;
use Illuminate\Http\Request;

class FxController extends Controller
{
    private $fxService;

    public function __construct(FxService $fxService)
    {
        $this->fxService = $fxService;
    }

    /**
     * トップページ
     * @return view
     */
    public function top()
    {
        return view('main');
    }

    public function search(SearchRequest $searchRequest) {
        $fromDate = $searchRequest->input('fromDate');
        $toDate = $searchRequest->input('toDate');
 
        $trades = $this->fxService->search($fromDate, $toDate);
        return view('trade_list', ['trades' => $trades]);
    }

    public function newModal() {
        $currencyPairs = $this->fxService->getCurrencyPairs();

        return view('modal', ['currencyPairs' => $currencyPairs,
                              'trade' => new Trade()]);
    }

    public function save(SaveRequest $request) {
        $trade = new Trade();
        $trade->setId($request->input('id'))
              ->setTradingDate($request->input('tradingDate'))
              ->setSettlementDate($request->input('settlementDate'))
              ->setCurrencyPairId($request->input('currencyPairId'))
              ->setTradeType($request->input('tradeType'))
              ->setQuantity($request->input('quantity'))
              ->setEntryPrice($request->input('entryPrice'))
              ->setExitPrice($request->input('exitPrice'))
              ->setStopLoss($request->input('stopLoss'))
              ->setProfit($request->input('profit'))
              ->setComment($request->input('comment'));
     
        $this->fxService->save($trade);

       return ['message' => '登録しました。'];
    }

    public function editModal(Request $request) {
        $currencyPairs = $this->fxService->getCurrencyPairs();
        $trade = $this->fxService->find($request->input('id'));

        return view('modal', ['currencyPairs' => $currencyPairs,
                              'trade' => $trade]);
                          
    }

    public function delete(Request $request) {
        $ids = $request->input('deleteIds');
        if ($ids) {
            $this->fxService->delete($ids);
            return ['message' => '削除しました。'];
        }
        return null;
    }

}