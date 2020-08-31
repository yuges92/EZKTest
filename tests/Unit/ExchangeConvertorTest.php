<?php

namespace Tests\Unit;

use App\Service\ExchangeConvertor;
use App\Service\ExchangeRateApi;
use Tests\TestCase;

class ExchangeConvertorTest extends TestCase
{

    /**
     * @test
     */
    public function canConvertGBPTOUSD()
    {
        $exchangeApi = new ExchangeRateApi(config('app.exchange_api'));
        $baseCurrency = "GBP";
        $rates = $exchangeApi->get("base={$baseCurrency}")->rates;
        $convertor = new ExchangeConvertor($exchangeApi);
        $response = $convertor->convert($baseCurrency, 'USD', 2);
        $this->assertEquals(2 * $rates->USD, $response);

    }
}
