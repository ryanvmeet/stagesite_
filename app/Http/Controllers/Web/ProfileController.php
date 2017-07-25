<?php

namespace App\Http\Controllers\Web;

use App\Company;
use App\Education_offer;
use App\Internship;
use App\Internshiptool;
use App\InternshipUser;
use App\School;
use App\Tool;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    
    public function index()
    {

        $profile = Contact::findOrFail(Auth::user()->contact_id);
        if(Auth::user()->getRole() == 'practical trainer') {
            $company = Company::findOrfail($profile->company_id);
        }
        else
        {
            $company = NULL;
        }
        if (Auth::user()->getRole() == 'student' || Auth::user()->getRole() == 'teacher')
        {
                $school = School::find($profile->school_id);
            if ($school == NULL)
            {
                return Redirect::route('contact.edit', $profile->id);
            }

        }
        else
        {
            $school = NULL;
        }
        $InternshipUsers = InternshipUser::all();
        $interships = [];
        foreach ($InternshipUsers as $internshipUser)
        {
            if(Auth::user()->id == $internshipUser->user_id)
            {
                $intership = Internship::where('id', $internshipUser->internship_id)->first();
                $interships[] = $intership;
            }
        }

        $tools = Tool::all ();

        $toolsArray = [];

        foreach ($tools as $tool)
        {
            if ($tool->status_id == 4)
            {
                $toolsArray[$tool->id] = $tool->name;
            }
        }

        $internshiptools = Internshiptool::where('internship_user_id', Auth::user()->id)->get();
        $x = 0;

        $internshiptoolArray = [];
        foreach ($internshiptools as $internshiptool)
        {

            $toolz = Tool::findorfail($internshiptool->tool_id)->get();

            $x = $x + 1;
            foreach ($toolz as $tool)
            {

                if ($tool->id == $internshiptool->tool_id)
                {
                    if ($tool->status_id == 4)
                    {
                        $internshiptoolArray[$tool->id] = $tool;
                    }
                }

            }
            
        }

        $education = Education_offer::all ();

        foreach ($education as $c)
        {
            $educationArray[$c->id] = $c->name;
        }

        return view('profile.index', compact('profile', 'company', 'school', 'interships', 'toolsArray', 'internshiptoolArray', 'educationArray'));
    }
    

    public function edit()
    {
        $profile = Contact::findOrFail(Auth::user()->contact_id);

        return view('profile.edit', compact('profile', 'company'));
    }
}
