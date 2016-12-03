<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    /**
     * Test each route to make sure view and content exists.
     *
     * @return void
     */
    public function testRoutesExist()
    {
        // MAIN ROUTES

        $this->visit('/')
            ->see('Eagle Ads');

        $this->visit('about')
            ->see('About Us');

        $this->visit('join')
            ->see('Join Us');

        $this->visit('success')
            ->see('Thanks for Joining');

        $this->visit('login')
            ->see('Member Login');

        $this->visit('forgot')
            ->see('Forgot Your Login?');

        $this->visit('faqs')
            ->see('F.A.Q.');

        $this->visit('terms')
            ->see('Terms');

        $this->visit('privacy')
            ->see('Privacy');

        $this->visit('support')
            ->see('Support');

        // MEMBER ROUTES

        $this->visit('account')
            ->see('Welcome');

        $this->visit('profile')
            ->see('Update Account');

        $this->visit('promote')
            ->see('Promote');

        // ADMIN ROUTES

        $this->visit('admin')
            ->see('Admin Login');

        $this->visit('admin/main')
            ->see('Your Admin Area');

        $this->visit('admin/forgot')
            ->see('Forgot Your Login?');

        $this->visit('admin/settings')
            ->see('Site Settings');

        $this->visit('admin/members')
            ->see('Members');

        $this->visit('admin/transactions')
            ->see('Site Transactions');

        $this->visit('admin/content')
            ->see('Edit Pages');

        $this->visit('admin/faqs')
            ->see('F.A.Q.s');

        $this->visit('admin/promotionals')
            ->see('Promotional Ads');




    }
}
