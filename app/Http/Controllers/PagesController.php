<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Page;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use View;
use Validator;
use DateTime;
use Mail;

class PagesController extends Controller
{
    /** testing PHPUnit on Controllers */
    public static function add($num1, $num2) {
        return $num1 + $num2;
    }

    public function index($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'home')->first();
        Session::flash('page', $content);
        return view('pages.index', compact('referid'));
    }

//    public function home($referid = null) {
//        $this->setreferid($referid);
//        $content = Page::where('slug', '=', 'home')->first();
//        Session::flash('page', $content);
//        return view('pages.index', compact('referid'));
//    }

//    public function delete() {
//        Session::set('user', null);
//        $content = Page::where('slug', '=', 'delete')->first();
//        Session::flash('page', $content);
//        return view('pages.delete');
//    }

    public function about($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'about')->first();
        Session::flash('page', $content);
        return view('pages.about');
    }

    public function terms($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'terms')->first();
        Session::flash('page', $content);
        return view('pages.terms');
    }

    public function privacy($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'privacy')->first();
        Session::flash('page', $content);
        return view('pages.privacy');
    }

    public function support($referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', 'support')->first();
        Session::flash('page', $content);
        return view('pages.support');
    }

    public function thankyou() {
        $content = Page::where('slug', '=', 'thankyou')->first();
        Session::flash('page', $content);
        return view('pages.thankyou');
    }

    public function faqs($referid = null) {
        $this->setreferid($referid);
        // get the admin's content for the FAQ page if they've written any.
        $page = Page::where('slug', '=', 'faqs')->first();
        // get the questions and answers.
        $faqs = Faq::orderBy('positionnumber', 'asc')->get();
        return view('pages.faqs', compact('faqs', 'page'));
    }

    public function success() {
        $content = Page::where('slug', '=', 'success')->first();
        Session::flash('page', $content);
        return view('pages.success');
    }

    public function logout() {
        Session::set('user', null);
        return Redirect::to('/');
    }

    public function custompage($page, $referid = null) {
        $this->setreferid($referid);
        $content = Page::where('slug', '=', $page)->first();
        Session::flash('page', $content);
        return view('pages.custompage');
    }

}
