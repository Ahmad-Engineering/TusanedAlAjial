<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TusanedController extends Controller
{
    //

    public function showHome() {
        return response()->view('tusaned.index');
    }

    public function showAbout () {
        return response()->view('tusaned.about');
    }

    public function showIdeaBank (){
        return response()->view('tusaned.ideaBank');
    }

    public function showActions () {
        return response()->view('tusaned.actions');
    }

    public function showEvents () {
        return response()->view('tusaned.events');
    }

    public function showContactUs () {
        return response()->view('tusaned.contactUs');
    }

    public function showEventsInfo () {
        return response()->view('tusaned.eventsInfo');
    }

    public function showAboutBrachOne () {
        return response()->view('tusaned.aboutBranch1');
    }

    public function showAboutBrachTwo () {
        return response()->view('tusaned.aboutBranch2');
    }

    public function showAboutBrachThree () {
        return response()->view('tusaned.aboutBranch3');
    }

    public function showSubmitIdeaOne () {
        return response()->view('tusaned.submitIdea');
    }

    public function showSubmitIdeaTwo () {
        return response()->view('tusaned.submitIdea2');
    }

    public function showSubmitIdeaThree () {
        return response()->view('tusaned.submitIdea3');
    }

    public function showSubmitIdeaFour () {
        return response()->view('tusaned.submitIdea4');
    }

    public function showSubmitIdeaFive () {
        return response()->view('tusaned.submitIdea5');
    }
}
