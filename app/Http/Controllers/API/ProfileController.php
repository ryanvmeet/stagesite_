<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $input = $request->all();
            $profile = Contact::findOrFail(Auth::user()->contact_id);

        $profile->update($input);

        return redirect(route('profile.index'));
    }
}
