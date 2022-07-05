<?php

namespace App\Repositories;

use App\Models\CurrencyPair;
use App\Service\CurrencyPairRepository as ICurrencyPairRepository;

class CurrencyPairRepository implements ICurrencyPairRepository
{
    public function findAll(): array
    {
        $results = \DB::table('currency_pair')->get()->all();

        return array_map(fn($currencyPair) => new CurrencyPair($currencyPair), $results);
    }
}