<?php

namespace App\Http\Controllers\Web;

use App\Categorie;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function create(){

        $categories = Categorie::all();

        $categorieArray = [];

        foreach($categories as $categorie){

                $categorieArray[$categorie->id] = $categorie->name;
            }


        return view('status.create', compact('categorieArray'));
    }

    public function index(){
        $categories = Categorie::all();
        
        $statusArray = [];
        $statusArray1 = [];
        $statusArray2 = [];

        foreach($categories as $categorie){
            foreach($categorie->status as $status){
                if($status->categorie_id == 1){
                    $statusArray[$status->id] = $status->name;
                }
                elseif($status->categorie_id == 2){
                    $statusArray1[$status->id] = $status->name;
                }
                else{
                    $statusArray2[$status->id] = $status->name;
                }

            }
        }

        return view('status.index', compact('statusArray', 'statusArray1', 'statusArray2'));
    }

    public
    function edit ($status)
    {
        $status = Status::findOrFail ($status);

        return view ('status.edit', compact ('status'));
    }

}
