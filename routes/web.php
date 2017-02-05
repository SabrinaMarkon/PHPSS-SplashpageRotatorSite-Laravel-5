<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* MAIN ROUTES */

Route::get('about/{referid}', 'PagesController@about');
Route::get('about', 'PagesController@about');

Route::get('terms/{referid}', 'PagesController@terms');
Route::get('terms', 'PagesController@terms');

Route::get('privacy/{referid}', 'PagesController@privacy');
Route::get('privacy', 'PagesController@privacy');

Route::get('support/{referid}', 'PagesController@support');
Route::get('support', 'PagesController@support');


Route::get('join', function() {
    return view('pages.join');
});

Route::get('success', function() {
    return view('pages.success');
});

Route::get('login', function() {
    return view('pages.login');
});

Route::get('forgot', function() {
    return view('pages.forgot');
});

Route::get('faqs', function() {
    return view('pages.faqs');
});

/* MEMBER ROUTES */

Route::get('account', function() {
    return view('pages.account');
});

Route::get('profile', function() {
    return view('pages.profile');
});

Route::get('promote', function() {
    return view('pages.promote');
});

/* ADMIN ROUTES */

Route::get('admin', function () {
    return view('pages.admin.index');
});

Route::get('admin/main', function () {
    return view('pages.admin.main');
});

Route::get('admin/forgot', function () {
    return view('pages.admin.forgot');
});

Route::get('admin/settings', function () {
    return view('pages.admin.settings');
});

Route::get('admin/members', function () {
    return view('pages.admin.members');
});

Route::get('admin/transactions', function () {
    return view('pages.admin.transactions');
});

Route::get('admin/content', function () {
    return view('pages.admin.content');
});

Route::get('admin/mailout', function () {
    return view('pages.admin.mailout');
});

Route::get('admin/faqs', function () {
    return view('pages.admin.faqs');
});

Route::get('admin/promotionals', function () {
    return view('pages.admin.promotionals');
});

/*
 * Custom pages added by the admin
 * IMPORTANT: this must be the last route or core pages such as faqs will
 * be treated as a custom page instead of a core. This causes them to show the
 * admin's text they add but not any database data.
 */
Route::get('{page}', 'PagesController@custompage');


//Route::get('{page}/{referid}', 'PagesController@custompage');

/*
 * home page with optional referid. These are the last routes so they aren't used when the route is say,
 * /about (where the 'about' would be misinterpreted as the referid).
 */
Route::get('/{referid}', 'PagesController@index');
Route::get('/', 'PagesController@index');