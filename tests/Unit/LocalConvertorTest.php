<?php

namespace Tests\Unit;

use App\Service\LocalConvertor;
use Tests\TestCase;

class LocalConvertorTest extends TestCase
{
    /**
     * @test
     */
    public function canConvertFromGBPToUSD()
    {
        $rates = [
            'GBP' => ["USD" => 1.3, "EUR" => 1.1,],
            'EUR' => ["GBP" => 0.9, "USD" => 1.2,],
            'USD' => ["GBP" => 0.7, "EUR" => 0.8,]
        ];
        $convertor = new LocalConvertor();
        $convertedRate=$convertor->convert('GBP', 'USD',10);
        $expected= $rates['GBP']['USD']*10;
        $this->assertEquals($expected, $convertedRate);
    }

    /**
     * @test
     */
    public function canConvertFromGBPToEUR()
    {
        $rates = [
            'GBP' => ["USD" => 1.3, "EUR" => 1.1,],
            'EUR' => ["GBP" => 0.9, "USD" => 1.2,],
            'USD' => ["GBP" => 0.7, "EUR" => 0.8,]
        ];
        $convertor = new LocalConvertor();
        $convertedRate=$convertor->convert('GBP', 'EUR',10);
        $expected= $rates['GBP']['EUR']*10;
        $this->assertEquals($expected, $convertedRate);

    }

    /**
     * @test
     */
    public function canConvertFromUSDToGBP()
    {
        $rates = [
            'GBP' => ["USD" => 1.3, "EUR" => 1.1,],
            'EUR' => ["GBP" => 0.9, "USD" => 1.2,],
            'USD' => ["GBP" => 0.7, "EUR" => 0.8,]
        ];
        $convertor = new LocalConvertor();
        $convertedRate=$convertor->convert('USD', 'GBP',10);
        $expected= $rates['USD']['GBP']*10;
        $this->assertEquals($expected, $convertedRate);

    }
}
