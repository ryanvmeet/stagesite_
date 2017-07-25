<?php

namespace App\Http\Controllers\API;

use App\Company;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //
    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:50|min:2',
            'phonenumber' => 'max:11|min:2',
        ]);
    }

    public function store(Request $request)
    {

        $input = $request->all();
        $validate = $this->validator($input);
        if ($validate->fails()) {
            $this->throwValidationException($request, $validate);
        } else {
            Company::create($input);
        }
        return redirect(route('company.index'));
    }

    public function update(Request $request, $company)
    {

        $input = $request->all();

        $validate = $this->validator($input);
        if ($validate->fails()) {
            $this->throwValidationException($request, $validate);
            $this->errors($validate);
        } else {

            $company = Company::findOrFail($company);
            $company->update($input);
        }
        return redirect(route('company.index'));
    }

    public function destroy($company)
    {

        if(Company::destroy($company)) {
            return redirect (route ('company.index'));
        }
        return response(0, 200);
    }

}

