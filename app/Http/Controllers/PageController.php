<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Privacy;
use App\Models\Term;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPage () {
        return About::first();
    }

    public function privacyPage () {
        return Privacy::first();
    }

    public function termPage () {
        return Term::first();
    }

    public function contactPage(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validated) {
            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message']
            ]);

            $return_msg = 'شكراً لتواصلك معنا .';

            return response()->json([
                'msg' => $return_msg,
            ]);;
        }

    }
}
