<?php

namespace App\Service;

interface CurrencyPairRepository
{
    public function findAll() : array;
}