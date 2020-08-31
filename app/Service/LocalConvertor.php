<?php


namespace App\Service;


class LocalConvertor implements ConvertorInterface
{
    private $rates = [];

    /**
     * sets the default rates.
     */
    public function __construct()
    {
        $this->rates = config('app.rates');
    }


    /**
     * return a converted a float value for given arguments.
     * @param string $baseCurrency
     * @param string $currencyType
     * @param float $val
     * @return float
     */
    public function convert(string $baseCurrency, string $currencyType, float $val): float
    {
        if ($baseCurrency == $currencyType) return $val;

        try {
            if ($this->rates[$baseCurrency] && $this->rates[$baseCurrency][$currencyType]) {
                return $val * $this->rates[$baseCurrency][$currencyType];
            }
        } catch (\Exception $e) {
            echo $e;

        }


    }

}
