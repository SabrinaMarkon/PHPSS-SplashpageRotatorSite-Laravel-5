<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForgotLoginTest extends TestCase
{
    /**
     * Test that forgot login form submits to the correct url.
     *
     * @return void
     * @test
     */
    public function does_forgot_login_form_submit_to_the_correct_url()
    {
        $this->visit('/forgot')
            ->press('forgot_button')
            ->seePageIs('/forgot/');
    }
}
