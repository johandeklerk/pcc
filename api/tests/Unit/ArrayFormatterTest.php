<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Classes\ArrayFormatter;

class ArrayFormatterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @param ArrayFormatter $arrayFormatter
     * @return void
     */
    public function testBasicTest()
    {
        $arrayFormatter = new ArrayFormatter();
        $output = $arrayFormatter->filterValuesBetweenMinMax([1,3,5,8,15,17], 1, 20);
        $this->assertEquals($output,'2,4,6-7,9-14,16,18-20');
    }
}
