<?php

namespace App\Http\Controllers\API;

use App\Tool;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ToolController extends Controller
{
	private
	function validator (array $data)
	{
		return Validator::make ($data, [
			'name'        => 'required|max:50|min:2',
			'description' => '|max:60|min:2',
			'status_id'   => 'required',
		]);
	}

	public
	function store (Request $request)
	{
		$input = $request->all ();
		$validate = $this->validator ($input);
		if ($validate->fails ())
		{
			$this->throwValidationException ($request, $validate);
		}
		else
		{
			Tool::create ($input);
		}

		return redirect (route ('tool.index'));
	}

	public
	function update (Request $request, $tool)
	{
		$input = $request->all ();

			$tool = Tool::findOrFail ($tool);
			$tool->update ($input);
		

		return redirect (route ('tool.index'));
	}

	public
	function destroy ($tool)
	{

		$tool = Tool::findOrFail ($tool);
		$tool->delete ();

		return redirect (route ('tool.index'));

	}
}
