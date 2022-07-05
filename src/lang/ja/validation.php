<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => ':attribute を入力してください。',
    'date' => ':attribute は日付を入力してください。',
    'integer' => ':attribute は整数を入力してください。',
    'numeric' => ':attribute は数値を入力してください。',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'tradingDate' => '取引日',
        'settlementDate' => '決済日',
        'currencyPair' => '通貨ペア',
        'tradeType' => 'ask/bid',
        'quantity' => '数量',
        'entryPrice' => 'Entry',
        'exitPrice' => 'Exit',
        'stopLoss' => 'S/L(pips)',
        'profit' => '損益',
        'fromDate' => '検索開始日',
        'toDate' => '検索終了日',
    ],

];
