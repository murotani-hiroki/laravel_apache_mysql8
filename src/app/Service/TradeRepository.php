<?php
namespace App\Service;

use App\Models\Trade;

interface TradeRepository
{
    /**
     * @param string|null $fromDate 検索開始日
     * @param string|null $toDate 検索終了日
     * @return array
     */
    public function search(?string $fromDate, ?string $toDate) : array;

    public function insert(Trade $trade) : int;
    
    public function update(Trade $trade) : void;

    public function delete(array $ids) : void;

    public function find(int $id) : Trade;
}