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
     */
    public function testNavLinksGoToCorrectRouteWhenClicked()
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

        $this->visit('/')
            ->click('join')
            ->seePageIs('/join/');

        $this->visit('/')
            ->click('login')
            ->seePageIs('/login/');

        // AUTHENTICATED LINKS:

//        $this->visit('/account')
//            ->click('home')
//            ->seePageIs('/');
//
////        $this->visit('/account')
////            ->click('account')
////            ->seePageIs('/account');
////
////        $this->visit('/account')
////            ->click('profile')
////            ->seePageIs('/profile');
////
////        $this->visit('/account')
////            ->click('faqs')
////            ->seePageIs('/faqs/');
////
////        $this->visit('/account')
////            ->click('support')
////            ->seePageIs('/support/');
////
////        $this->visit('/account')
////            ->click('logout')
////            ->seePageIs('/logout');
    }
}
