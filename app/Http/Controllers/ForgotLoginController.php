<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\PasswordReset;
use Mail;
use Redirect;
use Session;

class ForgotLoginController extends Controller
{
    /**
     * User visits the /forgot page to reset their forgotten password via an email sent to them.
     * @param null $referid
     * @return mixed
     */
    public function forgot($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'forgot')->first();
        Session::flash('page', $content);
        return view('pages.forgot');
    }

    /**
     * Use submits the form to request a an email to reset their password.
     * @param Request $request
     * @param null $referid
     * @return mixed
     */
    public function emaillogin(Request $request, $referid = null) {

        $this->setreferid($referid);
        $forgotemail = $request->get('forgotemail');
        $found = Member::where('email', $forgotemail)->first();
        if ($found !== null) {

            // forgotten password link email
            $passwordreset = new PasswordReset();
            $passwordreset->email = $forgotemail;
            $passwordreset->token = str_random(30);
            $passwordreset->save();

            // forgotten password link email:
            $html = "Dear ".$found->firstname.",<br><br>";
            $html .= "Please click here to reset your password: <a href=\"" . $request->get('domain') . "/reset/" . $passwordreset->token . "\">" . $request->get('domain') . "/reset/" . $passwordreset->token . "</a>";
            $html .=  "<br><br>" . $request->get('sitename') . " Admin<br>" . $request->get('domain') . "<br><br><br>";

            Mail::send(array(), array(), function ($message) use ($html, $request, $forgotemail, $found) {
                $message->to($forgotemail, $found->firstname . ' ' . $found->lastname)
                    ->subject($request->get('sitename') . ' Password Reset')
                    ->from($request->get('adminemail'), $request->get('adminname'))
                    ->setBody($html, 'text/html');
            });

            Session::flash('message', ' Check your email, ' . $found->email . ', for a link to reset your password!');
        } else {
            Session::flash('errors', 'That email address was not found');
        }
        return Redirect::to('forgot');
    }


}
