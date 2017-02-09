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

    /**
     * Test to check if the forgot login form gives an error if the wrong email is entered.
     *
     * @return void
     * @test
     */
    public function does_an_error_show_the_forgot_login_form_with_an_error()
    {
        // email doesn't exist in the database or is malformed.
        $this->visit('/forgot')
            ->type('durr.com', 'forgotemail')
            ->press('forgot_button')
            ->seePageIs('/forgot/')
            ->see('alert-danger');
    }

    /**
     * Test to check if the forgot login form gives success message if the right email is entered.
     *
     * @return void
     * @test
     */
    public function does_the_forgot_login_form_show_a_success_message_if_the_email_is_valid()
    {
        // email doesn't exist in the database or is malformed.
        $this->visit('/forgot')
            ->type('phpsitescripts@outlook.com', 'forgotemail')
            ->press('forgot_button')
            ->seePageIs('/forgot/')
            ->see('alert-success');
    }

}
