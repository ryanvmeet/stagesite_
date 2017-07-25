<?php

namespace App\Http\Controllers\Web;

use App\Status;
use App\Tool;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ToolController extends Controller
{
    public function index()
    {
        $tool = Tool::all();
        return view('tool.index', compact('tool'));
    }

    public function show($tool)
    {

        $tool = Tool::findOrFail($tool);

        $status = Status::findorFail($tool->status_id);
        
        return view('tool.show', compact('tool', 'status'));
    }

    public function create()
    {
        $status = Status::all ();

        $statusArray = [];


        foreach ($status as $state)
        {
            if ($state->categorie_id == 2)
            {
                $statusArray[$state->id] = $state->name;
            }
        }
        
        return view('tool.create', compact('statusArray'));
    }

    public function edit($tool)
    {
        $status = Status::all ();

        $statusArray = [];


        foreach ($status as $state)
        {
            if ($state->categorie_id == 2)
            {
                $statusArray[$state->id] = $state->name;
            }
        }

        $tool = Tool::findOrFail($tool);
        return view('tool.edit', compact('tool', 'statusArray'));

    }
}
