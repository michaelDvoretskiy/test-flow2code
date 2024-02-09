<?php

namespace Tests\Unit\ModelMappper;

use App\ModelMappers\CountryMapper;
use App\Models\Country;
use PHPUnit\Framework\TestCase;

class CountryMapperTest extends TestCase
{
    /**
     * @dataProvider countryMapperDataProvider
     */
    public function test_invoke($testData): void
    {
        $country = new Country();
        $country->id = $testData['id'];
        $country->name = $testData['name'];
        $data = (new CountryMapper)($country);

        $this->assertIsArray($data);
        $this->assertEquals($testData, $data);
    }

    public function countryMapperDataProvider()
    {
        return [
            [['id' => 1, 'name' => 'USA']],
            [['id' => 2, 'name' => 'Poland']],
            [['id' => 3, 'name' => 'Ukraine']],
        ];
    }
}
