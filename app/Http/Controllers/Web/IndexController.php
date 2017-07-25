<?php

namespace App\Http\Controllers\Web;

use App\Company;
use App\Contact;
use App\Internship;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        
        $company = Company::all();

        return view('welcome', compact('company'));
    }

    public function search(Request $request){
        $input = $request->all();
        if(isset($input['zoekt']) && isset($input['done'])){
            $company = Company::whereHas('contacts', function($query){
                $query->wherehas('internships', function($q){
                    $q->where('status_id', 5 OR 'status_id',  7);
                });
            })->get();
            return view('welcome', compact('company'));
        }
        elseif(isset($input['zoekt'])){
            $company = Company::whereHas('contacts', function($query){
                $query->wherehas('internships', function($q){
                    $q->where('status_id', 5);
                });
            })->get();
            return view('welcome', compact('company'));
        }
        elseif(isset($input['done'])){
            $company = Company::whereHas('contacts', function($query){
                $query->wherehas('internships', function($q){
                    $q->where('status_id', 7);
                });
            })->get();

            return view('welcome', compact('company'));
        }
        else{
        $company = Company::all();

        return view('welcome', compact('company'));
        }
    }
}
