<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesControllerTest extends TestCase
{
    /**
     * A basic test example to see if PHPUnit works on controller code.
     *
     * @return void
     */
    public function test_add()
    {
        $num1 = 1;
        $num2 = 1;
        $sum = App\Http\Controllers\PagesController::add($num1, $num2);
        $this->assertEquals(2, $sum);
    }
}
