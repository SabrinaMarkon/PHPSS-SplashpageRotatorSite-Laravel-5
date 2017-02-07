<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Page;
use Session;
use Redirect;
use Validator;
use DateTime;
use Mail;

class MemberJoinController extends Controller
{
    public function join($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'join')->first();
        Session::flash('page', $content);
        return view('pages.join', compact('referid'));
    }
    public function joinpost(Request $request, $referid = null) {
        $this->setreferid($referid);
        // form validation.
        $rules = array(
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'userid' => 'required|max:255|unique:members',
            'password' => 'required|min:6|max:255|confirmed',
            'email' => 'required|email|max:255|unique:members',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            return Redirect::to('join')->withInput($request->all());
        } else {
            // create new member.
            $member = new Member;
            $member->userid = $request->get('userid');
            $member->password = bcrypt($request->get('password'));
            $member->firstname = $request->get('firstname');
            $member->lastname = $request->get('lastname');
            $member->email = $request->get('email');
            $member->referid = $request->get('referid');
            $signupdate = new DateTime();
            $signupdate = $signupdate->format('Y-m-d');
            $member->signupdate = $signupdate;
            $remote_addr = isset($_SERVER['REMOTE_ADDR'])? $_SERVER['REMOTE_ADDR']:'127.0.0.1';
            $member->ip = $remote_addr;
            $http_referer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'';
            $member->referringsite = $http_referer;

            // validation email:
            $verification_code = str_random(30);
            $member->verification_code = $verification_code;
            $html = "Dear ".$member->firstname.",<br><br>"
                ."Welcome to " . $request->get('sitename') . "!<br><br>"
                ."Your UserID: " . $member->userid . "<br>"
                ."Your Password: " . $request->get('password') . "<br>"
                ."Login URL: <a href="
                .$request->get('domain')."/login>"
                .$request->get('domain')."/login</a><br><br>"
                ."Please verify your email address by clicking this link:<br><br><a href="
                .$request->get('domain')."/verify/".$verification_code.">"
                .$request->get('domain')."/verify/".$verification_code."</a><br><br>"
                ."Thank you!<br><br>"
                .$request->get('sitename')." Admin<br>"
                ."".$request->get('domain')."<br><br><br>";

//            \Mail::send(array(), array(), function ($message) use ($html, $request) {
//                $message->to($request->get('email'), $request->get('firstname') . ' ' . $request->get('lastname'))
//                    ->subject($request->get('sitename') . ' Welcome Verification')
//                    ->from($request->get('adminemail'), $request->get('adminname'))
//                    ->setBody($html, 'text/html');
//            });
            // end validation email

            // email admin.
            $html = "Dear " . $request->get('adminname') . ",<br><br>"
                . "A new member just joined" . $request->get('sitename') . "!<br>"
                ."UserID: " . $member->userid . "<br>"
                . "Sponsor: " . $member->referid . "<br><br>"
                . "" . $request->get('domain') . "<br><br><br>";
//            \Mail::send(array(), array(), function ($message) use ($html, $request) {
//                $message->to($request->get('adminemail'), $request->get('adminname'))
//                    ->subject($request->get('sitename') . ' New Member Notification')
//                    ->from($request->get('adminemail'), $request->get('adminname'))
//                    ->setBody($html, 'text/html');
//            });

            // email sponsor.
            $referid = Member::where('userid', '=', $member->referid)->first();
            if ($referid) {
                $refemail = $referid->email;
                $refname = $referid->firstname . ' ' . $referid->lastname;
            } else {
                $refemail = $request->get('adminemail');
                $refname = $request->get('adminname');
            }
            $html = "Dear " . $refname . ",<br><br>"
                . "A new referral just joined under you in " . $request->get('sitename') . "!<br>"
                ."UserID: " . $member->userid . "<br><br>"
                . "" . $request->get('domain') . "<br><br><br>";
//            \Mail::send(array(), array(), function ($message) use ($html, $refemail, $refname, $request) {
//                $message->to($refemail, $refname)
//                    ->subject(' You Have a New Referral at ' . $request->get('sitename'))
//                    ->from($request->get('adminemail'), $request->get('adminname'))
//                    ->setBody($html, 'text/html');
//            });

            $member->save();
            return Redirect::to('success');
        }
    }
}
