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
     * Test to check login form gives incorrect login error if user doesn't exist.
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
     * Test to check that a logged in user can click the logout link
     *
     * @return void
     * @test
     */
    public function can_a_logged_in_user_click_logout_link_and_see_home_page()
    {
        $this->visit('/login')
            ->type('sabrina', 'userid')
            ->type('testtest', 'password')
            ->press('login_button')
            ->seePageIs('/account/')
            ->see('Welcome')
            ->click('logout')
            ->seePageIs('/')
            ->see('Eagle Ads');
    }

}
