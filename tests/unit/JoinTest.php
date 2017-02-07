<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Member;

class JoinTest extends TestCase
{
    /**
     * Test to check registration form posts to the correct route.
     *
     * @return void
     * @test
     */
    public function does_the_registration_form_submit_to_the_correct_url()
    {
        $this->visit('/join')
            ->press('join_button')
            ->seePageIs('/join/');
    }

    /**
     * Test to check registration form gives errors if validation of the form fails.
     *
     * @return void
     * @test
     */
    public function does_an_error_show_the_registration_form_with_an_error()
    {
        $this->visit('/join')
            ->type('testuserid', 'userid')
            ->type('testpassword', 'password')
            ->type('testpassword', 'password_confirmation')
            ->type('Sabrina', 'firstname')
            ->type('Markon', 'lastname')
            ->type('phpsitescripts@outlook.com', 'email')
            ->press('join_button')
            ->seePageIs('/join/')
            ->see('alert-danger');
    }


    /**
     * Test to check registration form successfully goes to the success page when submitted with no errors.
     *
     * @return void
     * @test
     */
    public function does_success_page_show_the_registration_form_when_correct()
    {
        // delete record to reset:
        Member::where('userid', 'successuser')->delete();

        // test adding member using registration form.
        $this->visit('/join')
            ->type('successuser', 'userid')
            ->type('successpass', 'password')
            ->type('successpass', 'password_confirmation')
            ->type('Sabrina', 'firstname')
            ->type('Markon', 'lastname')
            ->type('sabrina.markon@gmail.com', 'email')
            ->press('join_button')
            ->seePageIs('/success/')
            ->see('Thanks!');
    }

}
