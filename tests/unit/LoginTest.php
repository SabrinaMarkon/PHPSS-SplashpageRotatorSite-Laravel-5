<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * Test to check login form posts to the correct route.
     *
     * @return void
     * @test
     */
    public function does_the_login_form_submit_to_the_correct_url()
    {
        $this->visit('/login')
            ->press('login_button')
            ->seePageIs('/login/');
    }

    /**
     * Test to check login form gives incorrect login error if user doesn't exit.
     *
     * @return void
     * @test
     */
    public function does_an_incorrect_login_show_the_login_form_with_an_error()
    {
        $this->visit('/login')
            ->type('testuserid', 'userid')
            ->type('testpassword', 'password')
            ->press('login_button')
            ->seePageIs('/login/')
            ->see('Incorrect Login');
    }

    /**
     * Test to check login form shows /accounts members area if login is correct.
     *
     * @return void
     * @test
     */
    public function does_a_correct_login_show_the_members_area_account_page()
    {
        $this->visit('/login')
            ->type('sabrina', 'userid')
            ->type('testtest', 'password')
            ->press('login_button')
            ->seePageIs('/account/')
            ->see('Welcome');
    }
}
