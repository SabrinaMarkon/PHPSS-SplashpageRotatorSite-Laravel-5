<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // initial set of site pages whose content may be edited by admin:
        DB::table('pages')->insert(array(
            array('name' => 'Home Page', 'slug' => 'home', 'core' => true),
            array('name' => 'About Us Page', 'slug' => 'about', 'core' => true),
            array('name' => 'Account Profile Page', 'slug' => 'profile', 'core' => true),
            array('name' => 'FAQs Page', 'slug' => 'faqs', 'core' => true),
            array('name' => 'Forgot Password Page', 'slug' => 'forgot', 'core' => true),
            array('name' => 'Member Registration Page', 'slug' => 'join', 'core' => true),
            array('name' => 'Login Page', 'slug' => 'login', 'core' => true),
            array('name' => 'Privacy Page', 'slug' => 'privacy', 'core' => true),
            array('name' => 'Support Page', 'slug' => 'support', 'core' => true),
            array('name' => 'Terms Page', 'slug' => 'terms', 'core' => true),
            array('name' => 'Account Main Page', 'slug' => 'account', 'core' => true),
            array('name' => 'Promote Page', 'slug' => 'promote', 'core' => true),
            array('name' => 'Successful Signup Page', 'slug' => 'success', 'core' => true),
        ));

        // initial site settings:
        DB::table('settings')->insert(array(
            array('name'    =>    'adminname',
                'setting'    =>    'Ken Rich',
                'description'    =>    'Admin Name'),
            array('name'    =>    'domain',
                'setting'    =>    'http://eagleads.phpsitescripts.com',
                'description'    =>    'Website Main Domain URL (with http:// and NO trailing slash)'),
            array('name'    =>    'sitename',
                'setting'    =>    "Eagle Ads",
                'description'    =>    'Website Name'),
            array('name'    =>    'adminemail',
                'setting'    =>    'phpsitescripts@outlook.com',
                'description'    =>    'Admin Support Email'),
            array('name'    =>    'adminpaypal',
                'setting'    =>    'payments@pearlsofwealth.com',
                'description'    =>    'Admin Paypal Account'),
            array('name'    =>    'adminpayza',
                'setting'    =>    'payments@pearlsofwealth.com',
                'description'    =>    'Admin Payza Account'),
        ));

        // programmer member/admin account for work:
        $now = new \DateTime();
        $password = 'testtest';
        $hashedPassword = Hash::make($password);

        DB::table('members')->insert(array(
            'userid'    =>    'sabrina',
            'password'    =>    $hashedPassword,
            'firstname'    =>    'Sabrina',
            'lastname'    =>    'Markon',
            'email'    =>    'phpsitescripts@outlook.com',
            'verified'    =>    1,
            'signupdate'    => $now,
            'ip'    =>    '127.0.0.1',
            'admin'   =>    1,
        ));


    }
}
