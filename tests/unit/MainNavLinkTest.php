<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MainNavLinkTest extends TestCase
{
    /**
     * Tests that when a user clicks a main or members area navigation link, it goes to the correct page.
     *
     * @return void
     * @test
     */
    public function do_nav_links_go_to_correct_route_when_clicked()
    {
        // UNAUTHENTICATED LINKS:
        $this->visit('/')
            ->click('home')
            ->seePageIs('/');

        $this->visit('/')
            ->click('about')
            ->seePageIs('/about/');

        $this->visit('/')
            ->click('terms')
            ->seePageIs('/terms/');

        $this->visit('/')
            ->click('privacy')
            ->seePageIs('/privacy/');

        $this->visit('/')
            ->click('faqs')
            ->seePageIs('/faqs/');

        $this->visit('/')
            ->click('support')
            ->seePageIs('/support/');
//
//        $this->visit('/')
//            ->click('join')
//            ->seePageIs('/join/');
//
//        $this->visit('/')
//            ->click('login')
//            ->seePageIs('/login/');
//
//        $this->visit('/login')
//            ->click('Forgot your login?')
//            ->seePageIs('/forgot/');
//
//        $this->visit('/admin/login')
//            ->click('Forgot your login?')
//            ->seePageIs('/admin/forgot/');

    }
}
