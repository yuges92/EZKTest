<?php


namespace App\Service;


class ExchangeConvertor implements ConvertorInterface
{
    private $rates = [];
    private $api = [];

    /**
     * sets the exchange rate api
     * @param ExchangeRateApi $exchangeRateApi
     */
    public function __construct(ExchangeRateApi $exchangeRateApi)
    {
        $this->api = $exchangeRateApi;
    }


    /**
     * return converted value for given arguments.
     * Uses ExchangeRateApi to get the latest rates and convert the value
     * @param string $baseCurrency
     * @param string $currencyType
     * @param float $val
     * @return float
     */
    public function convert(string $baseCurrency, string $currencyType, float $val): float
    {
        if ($baseCurrency == $currencyType) return $val;
        $this->rates = $this->api->get("base={$baseCurrency}")->rates;
        if ($this->rates->{$currencyType}) {
            return $val * $this->rates->{$currencyType};
        }

    }

}
