<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemberNavLinkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function do_member_nav_links_go_to_correct_route_when_clicked()
    {
        // AUTHENTICATED LINKS:

        $this->visit('/account')
            ->click('home')
            ->seePageIs('/');
//
//        $this->visit('/account')
//            ->click('account')
//            ->seePageIs('/account');
//
//        $this->visit('/account')
//            ->click('profile')
//            ->seePageIs('/profile');
//
//        $this->visit('/account')
//            ->click('faqs')
//            ->seePageIs('/faqs/');
//
//        $this->visit('/account')
//            ->click('support')
//            ->seePageIs('/support/');
//
//        $this->visit('/account')
//            ->click('logout')
//            ->seePageIs('/logout');
    }
}
