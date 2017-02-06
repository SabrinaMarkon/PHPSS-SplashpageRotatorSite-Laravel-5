<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use Redirect;

class MemberLoginController extends Controller
{
    public function login($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'login')->first();
        Session::flash('page', $content);
        return view('pages.login', compact('referid'));
    }
    public function loginpost(Request $request, $referid = null) {
        $this->setreferid($referid);
        $user = Member::where('userid', '=', $request->get('userid'))->first();
        if ($user) {
            $passwordIsOk = password_verify( $request->get('password'), $user->password);
            if ($passwordIsOk) {
                Session::set('user', $user);
                return Redirect::to('account');
            } else {
                Session::set('user', null);
                Session::flash('message', 'Incorrect Login');
                return Redirect::to('login');
            }
        } else {
            Session::set('user', null);
            Session::flash('message', 'Incorrect Login');
            return Redirect::to('login');
        }
    }
}
