<?php

namespace App\Service;


interface ConvertorInterface
{
public function convert(String $baseCurrency,String $currencyType, float $val):float;
}
