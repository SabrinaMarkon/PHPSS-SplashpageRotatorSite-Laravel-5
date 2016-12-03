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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('about', function() {
    return view('pages.about');
});

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

Route::get('terms', function() {
    return view('pages.terms');
});

Route::get('privacy', function() {
    return view('pages.privacy');
});

Route::get('support', function() {
    return view('pages.support');
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

Route::get('admin/faqs', function () {
    return view('pages.admin.faqs');
});

Route::get('admin/promotionals', function () {
    return view('pages.admin.promotionals');
});
