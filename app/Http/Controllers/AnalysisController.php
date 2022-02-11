<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ApplyIdea;
use App\Models\Contact;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    //

    private String $email = 'az540546@gmail.com';

    public function showAnalysis () {
        $admin_count = Admin::count();
        $idea_count = ApplyIdea::count();
        $contact_count = Contact::where('status', 1)->count();
        return response()->view('cpanel.analytics.index', [
            'admin_count' => $admin_count,
            'idea_count' => $idea_count,
            'contact_count' => $contact_count,
        ]);
    }
}
